<?php

namespace App\Controller;

use App\Http\JSend;
use App\Http\Message;
use App\Service\CardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/cards')]
class CardController extends AbstractController
{
    public function __construct(
        private readonly CardService $cardService
    )
    {
    }

    #[Route('/', name: 'api_get_cards', methods: 'GET')]
    public function getCardsRandomizer(): JsonResponse
    {
        return JSend::success(Message::CARD_LIST, $this->cardService->getCards(), Response::HTTP_OK);
    }

    #[Route('/sorted', name: 'api_get_cards_sorted', methods: ['POST'])]
    public function getCardsSorted(Request $request): JsonResponse
    {
        $cards = json_decode($request->getContent(), true);
        return JSend::success(Message::CARD_LIST, $this->cardService->sortCards($cards), Response::HTTP_OK);
    }

    #[Route('/sorted', name: 'api_cards_sorted_options', methods: ['OPTIONS'])]
    public function sortedCardsOptions(): JsonResponse
    {
        $response = new JsonResponse('test', 204); // ✅ Return 204 No Content

        // ✅ Allow CORS headers
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        return $response;
    }
}
