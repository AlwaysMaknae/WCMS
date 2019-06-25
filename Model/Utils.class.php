<?php


class Utils{

    public static function imageHandle($fieldName){
      try {
          // Undefined | Multiple Files | $_FILES Corruption Attack
          // If this request falls under any of them, treat it invalid.
          if (
              !isset($_FILES[$fieldName]['error']) ||
              is_array($_FILES[$fieldName]['error'])
          ) {
              throw new RuntimeException('Invalid parameters.');
          }

          // Check $_FILES['upfile']['error'] value.
          switch ($_FILES[$fieldName]['error']) {
              case UPLOAD_ERR_OK:
                  break;
              case UPLOAD_ERR_NO_FILE:
                  throw new RuntimeException('No file sent.');
              case UPLOAD_ERR_INI_SIZE:
              case UPLOAD_ERR_FORM_SIZE:
                  throw new RuntimeException('Exceeded filesize limit.');
              default:
                  throw new RuntimeException('Unknown errors.');
          }

          // You should also check filesize here.
          if ($_FILES[$fieldName]['size'] > 1000000) {
              throw new RuntimeException('Exceeded filesize limit.');
          }

          // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
          // Check MIME Type by yourself.
          $finfo = new finfo(FILEINFO_MIME_TYPE);
          if (false === $ext = array_search(
              $finfo->file($_FILES[$fieldName]['tmp_name']),
              array(
                  'jpg' => 'image/jpeg',
                  'png' => 'image/png',
                  'gif' => 'image/gif',
              ),
              true
          )) {
              throw new RuntimeException('Invalid file format.');
          }

          // You should name it uniquely.
          // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
          // On this example, obtain safe unique name from its binary data.
          $toBeName = md5_file($_FILES[$fieldName]['tmp_name']);

          if (!move_uploaded_file(
              $_FILES[$fieldName]['tmp_name'],
              sprintf('./uploads/%s.%s',
                  $toBeName,
                  $ext
              )
          )) {
              throw new RuntimeException('Failed to move uploaded file.');
          }

        #echo $toBeName . "." .$ext;
        return array(
            "succes" => true,
            "file" => $toBeName . "." .$ext
          );

      } catch (RuntimeException $e) {

        #echo $e->getMessage();
        return array(
          "succes" => false,
          "error" => $e->getMessage()
        );
      }
    }

}
