<?php

/*
Removes a folder, including its subfolders and files in a efficient
way without recursion, returns Boolean
*/

function removeFolder($dir)
{
        if(!is_dir($dir))
                return false;
        for($s = DIRECTORY_SEPARATOR, $stack = array($dir), $emptyDirs = array($dir); $dir = array_pop($stack);)
        {
                if(!($handle = @dir($dir)))
                        continue;
                while(false !== $item = $handle->read())
                        $item != '.' && $item != '..' && (is_dir($path = $handle->path . $s . $item) ?
                        array_push($stack, $path) && array_push($emptyDirs, $path) : unlink($path));
                $handle->close();
        }
        for($i = count($emptyDirs); $i--; rmdir($emptyDirs[$i]));
}
?>