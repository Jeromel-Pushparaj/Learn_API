<pre><?php

class Superhero {
    public function __construct($name){
        $this->name = $name;
    }

    public function __call($method, $args){
        echo "Method Called: $method\n";
        var_dump($args);

        $methods = get_class_methods('Superhero');
        var_dump($methods);

        foreach($methods as $m){
            if($m == $method){
                echo("Calling the private function from __call(): ".$m."\n");
                return $this->$m();
            }
        }
        $dir = __DIR__.'/api/apis';
        $methods = scandir($dir);

        foreach($methods as $m){
            if($m == "." or $m == ".."){
                echo $m;
                continue;
            }
            $basem = basename($m, '.php');
            echo "Trying to call $basem() for $method()\n";
            if($basem == $method){
                include $dir."/".$m;
                $func = Closure::bind(${$basem}, $this, get_class());
                if(is_callable($func)){
                    return call_user_func_array($func, $args);
                } else {
                    echo "Something is wrong";
                }
            }
        }

    }

    private function getName(){
        return $this->name;
    }
}

$hero = new Superhero("Batman");
echo $hero->getName()."\n";
echo $hero->get_powers();


?>
</pre>