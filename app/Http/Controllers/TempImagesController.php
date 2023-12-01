<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempImage;

class TempImagesController extends Controller
{
    public function create(Request $request)
    {
        $favicon = $request->file('favicon');
        $logo = $request->file('logo');
        $cover = $request->file('cover');

        $responseArray = [];

        // Handle favicon image
        if (!empty($favicon)) {
            $faviconExt = $favicon->getClientOriginalExtension();
            $faviconNewName = 'favicon_' . time() . '.' . $faviconExt;

            $tempFavicon = new TempImage();
            $tempFavicon->name = $faviconNewName;
            $tempFavicon->save();

            $favicon->move(public_path() . '/temp', $faviconNewName);

            $responseArray['favicon_id'] = $tempFavicon->id;
        }

        // Handle logo image
        if (!empty($logo)) {
            $logoExt = $logo->getClientOriginalExtension();
            $logoNewName = 'logo_' . time() . '.' . $logoExt;

            $tempLogo = new TempImage();
            $tempLogo->name = $logoNewName;
            $tempLogo->save();

            $logo->move(public_path() . '/temp', $logoNewName);

            $responseArray['logo_id'] = $tempLogo->id;
        }

        if (!empty($cover)) {
            $coverExt = $cover->getClientOriginalExtension();
            $coverNewName = 'cover_' . time() . '.' . $coverExt;

            $tempCover = new TempImage();
            $tempCover->name = $coverNewName;
            $tempCover->save();

            $cover->move(public_path() . '/temp', $coverNewName);

            $responseArray['cover_id'] = $tempCover->id;
        }

        if (!empty($responseArray)) {
            $responseArray['status'] = true;
            $responseArray['message'] = 'Images uploaded successfully';
        } else {
            $responseArray['status'] = false;
            $responseArray['message'] = 'No images provided';
        }

        return response()->json($responseArray);
    }

    public function upload(Request $request)
    {
        $image = $request->cover;

        if (!empty($image)) {
            $ext = $image->getClientOriginalExtension();
            $newName = time() . '.' . $ext;

            $tempImage = new TempImage();
            $tempImage->name = $newName;
            $tempImage->save();

            $image->move(public_path() . '/temp', $newName);

            return response()->json([
                'status' => true,
                'image_id' => $tempImage->id,
                'message' => 'Image uploaded successfully'
            ]);
        }
    }
}
