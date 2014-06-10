<?php
/**
 * Verifies that control statements conform to their coding standards.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Eduard Paliy
 */
class Oggetto_Sniffs_Functions_FunctionProtectedPrivateUndrelineSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Register sniff
     *
     * @return void
     */
    public function register()
    {
        return array(T_FUNCTION);
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
        $tokens = $phpcsFile->getTokens();

        if ($stackPtr > 1) {
            $accessModifier = $tokens[$stackPtr - 2]['content'];
            $name = $tokens[$stackPtr + 2]['content'];

            if (($accessModifier === 'private' || $accessModifier === 'protected') && $name[0] !== '_') {
                $phpcsFile->addError("Private and protected functions should be started with '_'", $stackPtr, 'Error');
            } elseif ($accessModifier === 'public' && $name[0] === '_') {
                $phpcsFile->addError("Public functions shouldn't be started with '_'", $stackPtr, 'Error');
            }
        }
    }
}
