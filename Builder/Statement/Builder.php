<?php

/*
 * Mondrian
 */

namespace Trismegiste\Mondrian\Builder\Statement;

use Trismegiste\Mondrian\Parser\PackageParser;

/**
 * Statement is a builder of statement of set of php files
 */
class Builder implements BuilderInterface
{

    protected $lexer;
    protected $fileParser;
    protected $packageParser;

    /**
     * {@inheritdoc}
     */
    public function buildLexer()
    {
        $this->lexer = new \PHPParser_Lexer();
    }

    /**
     * {@inheritdoc}
     */
    public function buildFileLevel()
    {
        $this->fileParser = new \PHPParser_Parser($this->lexer);
    }

    /**
     * {@inheritdoc}
     */
    public function buildPackageLevel()
    {
        $this->packageParser = new PackageParser($this->fileParser);
    }

    /**
     * {@inheritdoc}
     */
    public function getParsed(\Iterator $iter)
    {
        return $this->packageParser->parse($iter);
    }

}