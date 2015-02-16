<?php

trait GeekwiseAcademyTeacher {

    public function teach($what = null) {
        $homework = $this->homework($what);

        return "Today we'll be learning $what and your homework is $homework.";
    }

    public function homework($what = null) {
        if (is_null($what)) {
            return "Nothing!.";
        }

        switch ($what) {
            case "php":
                return 'learn about classes';
                break;
            case "javascript";
                return 'learn about javascript';
                break;
        }
    }

}