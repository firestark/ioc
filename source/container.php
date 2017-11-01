<?php

namespace ioc;

use closure;
use Illuminate\Container\Container as base;


class container extends base
{
	public function binding ( string $abstract, closure $concrete )
    {
        $concrete = function ( $container, array $parameters = [ ] ) use ( $concrete )
		{
			return $container->call ( $concrete, $parameters );
		};

		$this->bind ( $abstract, $concrete );
    }

    public function share ( string $abstract, closure $concrete )
	{
		$this->bind ( $abstract, $concrete, true );
	}
}