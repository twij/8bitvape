<?php

namespace App\Http\Controllers;

use App\Repositories\ImageRepository;
use Intervention\Image\Facades\Image as Img;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Jobs\UploadImage;

class ImageController extends Controller
{
    protected $imageRepository;

    /**
     * Constructor
     *
     * @param ImageRepository $imageRepository Image repository
     */
    public function __construct(
        ImageRepository $imageRepository
    ) {
        $this->imageRepository = $imageRepository;
    }

    /**
     * Get an image path from ID
     *
     * @param int $id Image id
     *
     */
    public function get(int $id)
    {
        $image = $this->imageRepository->find($id);

        return response()->file(storage_path('app/' . $image->path));
    }

    public function upload(Request $request)
    {
        return view('admin/image_upload');
    }

    public function create(Request $request)
    {
        $input = $request->validate(
            [
                'image' => 'required|image',
                'name' => 'string',
                'alt_text' => 'string'
            ]
        );

        $image = UploadImage::dispatchNow($input);

        if ($image) {
            return 'ok';
        } else {
            abort(500);
        }
    }
}
