<?php

trait GeekwiseAcademyTeacher {

    public function teach($what = null) {
        return "Today we'll be learning $what and your homework is " . $this->homework($what);
    }

    public function homework($what = null) {
        if (is_null($what)) {
            return "Nothing!.";
        }

        switch ($what) {
            case "php":
                return 'learn about classes.';
                break;
            case "javascript";
                return 'learn about javascript.';
                break;
        }
    }

}