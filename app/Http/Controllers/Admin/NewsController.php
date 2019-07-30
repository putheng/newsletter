<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsStoreFormRequest;
use App\Http\Resources\NewsResource;
use App\Models\Image;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
	public function show(Request $request)
	{
		return NewsResource::collection(
			$request->user()->news()->latest()->get()
		);
	}

    public function destroy(Request $request)
    {
        News::where('id', $request->id)->delete();

        return NewsResource::collection(
            News::latest()->get()
        );
    }

    public function store(NewsStoreFormRequest $request)
    {
    	$image = $this->storeFileUpload($request->file('image'));

    	$news = new News;
    	$news->title = $request->title;
    	$news->description = $request->description;
    	$news->user()->associate($request->user());
    	$news->image()->associate($image);

    	$news->save();

        return NewsResource::collection(
            News::latest()->get()
        );
    }

    public function storeImage(NewsStoreFormRequest $request)
    {
        dd($request->all());

        $image = $this->storeImageUpload($request->base64, $request->image);

        $news = new News;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->user()->associate($request->user());
        $news->image()->associate($image);

        $news->save();

        return NewsResource::collection(
            News::latest()->get()
        );
    }

    public function storeImageUpload($uploadFile, $fileName)
    {
        $filePath = $this->buildDirPath() . str_slug(uniqid(true) .'-'. $fileName).'.jpg';

        Storage::disk('asset')->put($filePath,
            base64_decode($uploadFile)
        );

        $file = new Image;

        $file->name = $fileName;
        $file->path = $filePath;
        $file->user()->associate(auth()->user());

        $file->save();

        return $file;
    }

    public function storeFileUpload(UploadedFile $uploadFile)
    {
    	$fileName = $uploadFile->getClientOriginalName();
        $filePath = $this->buildFilePath($uploadFile);

    	Storage::disk('asset')->put($filePath,
    		$this->getFileContent($uploadFile)
    	);

    	$file = new Image;

    	$file->name = $fileName;
    	$file->path = $filePath;
    	$file->user()->associate(auth()->user());

    	$file->save();

    	return $file;
    }

    public function getFileContent(UploadedFile $file)
    {
    	return file_get_contents($file->getRealPath());
    }

    public function buildFilePath(UploadedFile $file)
    {
    	$name = $file->getClientOriginalName();

    	return $this->buildDirPath() . str_slug(uniqid(true) .'-'. $name).'.'. $file->extension();
    }

    public function buildDirPath()
    {
    	return 'uploads/'. date('Y') .'/'. date('m') .'/';
    }
}
