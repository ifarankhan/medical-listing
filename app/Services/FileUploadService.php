<?php
namespace App\Services;


use Exception;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;


class FileUploadService
{
    /**
     * @throws Exception
     */
    public function uploadFile(
        $file,
        string $directory,
        array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'],
        int $maxWidth = 410,
        int $maxHeight = 280,
        int $maxSize = 10000
    ): string {
        // Validate file extension
        $extension = $file->getClientOriginalExtension();
        if (!in_array($extension, $allowedExtensions)) {
            throw new Exception('File type is not allowed');
        }
        // Validate file size
        $fileSizeInKB = $file->getSize() / 1024;
        if ($fileSizeInKB > $maxSize) {
            $maxSizeInMB = $maxSize / 1024;
            throw new Exception('File size exceeds the maximum allowed limit of ' . $maxSizeInMB . ' MB');
        }
        // Generate a unique file name
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
        // Define the directory and ensure it exists
        $directoryPath = storage_path('app/public/' . $directory);
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true); // Create the directory if it doesn't exist
        }
        // Check if the file is an image and handle resizing
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Resize the image using Intervention Image
            $image = Image::read($file);
            $image->resize($maxWidth, $maxHeight)
                 ->save($directoryPath . '/' . $fileName);

        } elseif ($extension === 'pdf') {
            // Handle PDF file upload (no resizing needed)
            $file->move($directoryPath, $fileName);
        }
        // Return the path to the saved file
        return $directory . '/' . $fileName;
    }
}
