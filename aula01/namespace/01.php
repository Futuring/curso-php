<?php
namespace foo\bar {
    function baz() {
        echo 'foo.bar.baz'.PHP_EOL;
    }
}
namespace bar\foo {
	function baz() {
		echo "bar.foo.baz".PHP_EOL;
	}
}

namespace {
    use function foo\bar\baz as baz1;
    use function bar\foo\baz as baz2;
    
    baz1();
    baz2();

    foo\bar\baz();
    bar\foo\baz();
}
