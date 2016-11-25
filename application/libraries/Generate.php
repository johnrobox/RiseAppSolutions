<?php

/*
 * Generate class (library)
 * Used to get generated string particularly subject to generate a token
 * Author : Robert
 * Date : November 25, 2016
 */

class Generate {
    
    public function __construct() {
        $this->numbers = '0123456789';
        $this->letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    
    /*
     * getLetters (letters generator function)
     * @params : $length (int) - the lenght of letters want to generate
     * @return : $random_letters (String)
     */
    public function getLetters($length = 10) {
        $random_letters = $this->builder($length, $this->letters);
        return $random_letters;
    }
    
    /*
     * getNumbers (Numbers generator function)
     * @params :  $length (int) - the lenght of Numbers want to generate
     * @return : $random_numbers (String)
     */
    public function getNumbers($length = 10) {
        $random_numbers = $this->builder($length, $this->numbers);
        return $random_numbers;
    }
    
    /*
     * getLettersNumbers (Letters-Numbers function)
     * @params : $length (int) - the lenght of Numbers want to generate
     * @return : $random_letters_numbers (String)
     */
    public function getLettersNumbers($length = 10) {
        $play_ground = $this->numbers.''.$this->letters;
        $random_letters_numbers = $this->builder($length, $play_ground);
        return $random_letters_numbers;
    }
    
    /*
     * builder (function use to build/generate random string)
     * @params : $length (int)
     * @params : $play_ground (a place/ground where to get the suggested random string)
     * @return : $randomString (string)
     */
    private function builder($length, $play_ground){
        $charactersLength = strlen($play_ground);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $play_ground[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
}

