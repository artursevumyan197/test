<?php

namespace App\Console\Commands;

use App\Classes\Authenticator;
use App\Exceptions\NoProductCreationRightsException;
use App\Exceptions\UnauthenticatedException;
use App\Rpository\Product\WriteProductRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws UnauthenticatedException
     */
    public function handle(WriteProductRepositoryInterface $writeProductRepository)
    {
        if (!Authenticator::check()) {

            throw new UnauthenticatedException('UnAuthenticated !');
        }

        $user = Authenticator::user();
        if ($user->permission !== 'update') {
            $product = $writeProductRepository->save(Str::random(8),$user->id);
        } else {
            return new NoProductCreationRightsException('Нет права на создание продукта');
        }

        $this->info('Product Id:' . $product->id);
    }
}
