<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Upload extends CI_Upload
{
    public function strip_image($path, $new_path = FALSE)
    {
        $this->set_image_properties($path);

        $image = new \Imagick($path);

        if ($this->image_type == 'GIF') {
            $image->writeImages(!empty($new_path) ? $new_path : $path, TRUE);
        } else {
            $image = $this->autoRotateImage($image);
            $image->stripImage();
            $image->writeImage(!empty($new_path) ? $new_path : $path);
        }

        $this->set_image_properties(!empty($new_path) ? $new_path : $path);
    }

    private function autoRotateImage($image)
    {
        $orientation = $image->getImageOrientation();

        switch ($orientation) {
            case \Imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateimage("#000", 180); // rotate 180 degrees
                break;

            case \Imagick::ORIENTATION_RIGHTTOP:
                $image->rotateimage("#000", 90); // rotate 90 degrees CW
                break;

            case \Imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateimage("#000", -90); // rotate 90 degrees CCW
                break;
        }

        // Now that it's auto-rotated, make sure the EXIF data is correct in case the EXIF gets saved with the image!
        $image->setImageOrientation(\Imagick::ORIENTATION_TOPLEFT);

        return $image;
    }

    public function thumbnail($old_path, $new_path, $width = 200, $height = 200, $bestfit = TRUE)
    {
        try {
            $image = new \Imagick($old_path);
            $image = $this->autoRotateImage($image);
            $image->thumbnailImage($width, $height, $bestfit);
            $image->stripImage();
            $image->writeImage($new_path);
            $image->destroy();
        } catch (\Exception $e) {
            return FALSE;
        }

        return TRUE;
    }
}