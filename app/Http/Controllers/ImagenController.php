<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // Valida y obtiene la imagen del request
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Guarda la imagen en storage/app/public/images
        $filePath = Storage::putFileAs('public/images', $image, $imageName);

        // Obtén la URL de la imagen
        $imageUrl = Storage::url($filePath);

        // Retorna la URL o haz cualquier otra operación que necesites
        return response()->json(['url' => $imageUrl]);
    }
}
