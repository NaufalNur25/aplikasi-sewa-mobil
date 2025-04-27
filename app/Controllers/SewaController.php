<?php

namespace App\Controllers;

/**
 * Nama: Naufal Nur Hafizh
 * NPM: 223111015
 */
class SewaController extends Controller
{
    const DATA_LIST = [
        'Suzuki APV' => [
            'nama' => 'Suzuki APV',
            'harga' => 350000,
            'gambar' => 'suzuki-apv-arena-hitam.png',
        ],
        'Toyota Avanza' => [
            'nama' => 'Toyota Avanza',
            'harga' => 450000,
            'gambar' => 'avanza-white.png',
        ],
        'Toyota Kijang Innova' => [
            'nama' => 'Toyota Kijang Innova',
            'harga' => 600000,
            'gambar' => 'innova-super-white.png',
        ],
    ];

    const DRIVER_PRICE = 100000;

    public function detail(String $mobil)
    {
        if (!isset(self::DATA_LIST[$mobil])) {
            return $this->view("404");
        }

        $detail = self::DATA_LIST[$mobil];
        $detail['nomorKendaraan'] = $this->getCarNumber();
        $detail['harga'] = $this->getCarPrice($detail['harga']);

        return $this->view('Detail', $detail);
    }

    public function process()
    {
        $nik         = $_POST['nik'] ?? '';
        $fullname    = $_POST['fullname'] ?? '';
        $address     = $_POST['address'] ?? '';
        $phone       = $_POST['phone'] ?? '';
        $email       = $_POST['email'] ?? '';
        $payment     = $_POST['payment'] ?? '';
        $isWithSupir = $_POST['isWithSupir'] ?? '';
        $rental      = $_POST['lamaSewa'] ?? '';
        $carName     = $_POST['carName'] ?? '';

        if (empty($nik) || empty($fullname) || empty($address) || empty($phone) || empty($email) || empty($payment) || empty($isWithSupir) || empty($rental) || empty($carName)) {
            http_response_code(404);
            Controller::notFound();
            exit;
        }

        $carDetail = self::DATA_LIST[$carName];
        $carBrands = $carDetail['nama'];
        
        $carPrice = $carDetail['harga'];
        $totalCarPrice = $carPrice * $rental;

        $driverPrice = $isWithSupir === 'ya' ? self::DRIVER_PRICE : 0;
        $totalDriverPrice = $driverPrice * $rental;

        $total = $totalCarPrice + $totalDriverPrice;

        $data = [
            'nik' => $nik,
            'fullname' => $fullname,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'payment' => $payment,
            'isWithSupir' => $isWithSupir,
            'rental' => $rental,
            'carBrands' => $carBrands,
            'carPrice' => $this->getCarPrice($carPrice),
            'totalCarPrice' => $this->getCarPrice($totalCarPrice),
            'totalDriverPrice' => $this->getCarPrice($totalDriverPrice),
            'total' => $this->getCarPrice($total)
        ];

        return $this->view('Proses', $data);
    }

    private function getCarNumber(): string
    {
        $minGenerator = 1000;
        $maxGenerator = 9999;
        $randomNumber = random_int($minGenerator, $maxGenerator);

        return "D {$randomNumber} UTS";
    }

    private function getCarPrice(int $price): string
    {
        return 'Rp ' . number_format($price, 2, ',', '.');
    }
}
