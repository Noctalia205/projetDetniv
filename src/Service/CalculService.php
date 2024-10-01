<?php
namespace App\Service;
use Psr\Log\LoggerInterface;
class CalculService
{
 public function __construct (private LoggerInterface $logger)
 {
 }
 public function calculTTC (int $prix, int $tva)
 {
 return $prix + ($prix * $tva / 100);
 }
}