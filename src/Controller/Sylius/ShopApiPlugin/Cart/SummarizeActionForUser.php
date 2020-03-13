<?php

declare(strict_types=1);

namespace App\Controller\Sylius\ShopApiPlugin\Cart;

use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sylius\ShopApiPlugin\ViewRepository\Cart\CartViewRepositoryInterface;

final class SummarizeActionForUser extends AbstractController
{
    /** @var CartViewRepositoryInterface */
    private $cartQuery;

    /** @var ViewHandlerInterface */
    private $viewHandler;

    public function __construct(
        CartViewRepositoryInterface $cartQuery,
        ViewHandlerInterface $viewHandler
    ) {
        $this->cartQuery = $cartQuery;
        $this->viewHandler = $viewHandler;
    }

    public function __invoke(Request $request): Response
    {
        // TODO get cart for logged in user
        print('todo - get cart for logged in user'); die;
        try {
            return $this->viewHandler->handle(
                View::create(
                    $this->cartQuery->getOneByToken($request->attributes->get('token')),
                    Response::HTTP_OK
                )
            );
        } catch (\InvalidArgumentException $exception) {
            throw new NotFoundHttpException($exception->getMessage());
        }
    }
}
