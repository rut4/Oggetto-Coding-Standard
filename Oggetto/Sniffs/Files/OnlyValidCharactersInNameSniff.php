<?php
/**
 * Parses and verifies the concatenation operator usage.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Eduard Paliy
 */

/**
 * Concatenation operator sniffer
 *
 * Makes sure there are spaces between the concatenation operator (.) and the strings being concatenated.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Eduard Paliy
 */
class Oggetto_Sniffs_Files_OnlyValidCharactersInNameSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_OPEN_TAG);
    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $fileName = $phpcsFile->getFileName();

        if (!preg_match("/^(\w|\/|\-)*(\w|\-)+\.php$/", $fileName)) {
            $phpcsFile->addError('Invalid file name', $stackPtr, 'Error');
        }
    }
}
