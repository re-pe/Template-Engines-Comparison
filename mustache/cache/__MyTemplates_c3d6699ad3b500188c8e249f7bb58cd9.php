<?php

class __MyTemplates_c3d6699ad3b500188c8e249f7bb58cd9 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<h2>';
        $value = $this->resolveValue($context->find('engine'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</h2>
';
        $buffer .= $indent . '<ul>
';
        $buffer .= $indent . '<?php echo "abcd"; ?php>
';
        // 'pages' section
        $value = $context->find('pages');
        $buffer .= $this->sectionD54c9ba8a24d77e5e4023de6b90c6ae8($context, $indent, $value);
        $buffer .= $indent . '</ul>
';

        return $buffer;
    }

    private function sectionD54c9ba8a24d77e5e4023de6b90c6ae8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
<li>{{ . }}</li>
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<li>';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
