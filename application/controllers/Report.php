<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isLogin();
	}

	public function pelanggan() {
		$this->load->model("ModelPelanggan");
		$listPelanggan = $this->ModelPelanggan->getAll();
		$filename = "Daftar Pelanggan";
		//langkah pembuatan excel
		//1.Buat Objek dari Spreadsheet
		$file = new Spreadsheet;
		//2.Aktif di sheet tertentu sekalian buat header
		$file->setActiveSheetIndex(0)
			->mergeCells("A1:E1")
			->setCellValue("A1", $filename)
			->setCellValue("A2", "No")
			->setCellValue("B2", "Kode Pelanggan")
			->setCellValue("C2", "Nama Pelanggan")
			->setCellValue("D2", "Alamat Pelanggan")
			->setCellValue("E2", "No Telp");
		//2.1 Set Kosmetik dari Excel
		$file->setActiveSheetIndex(0)
			->getStyle("A1")
			->applyFromArray($this->header());
		$file->setActiveSheetIndex(0)
			->getStyle("A2:E2")
			->applyFromArray($this->header());

		//3. Load data dan populate ke excel
		$baris = 3;
		$no = 1;
		foreach ($listPelanggan as $pelanggan) {
			$file->setActiveSheetIndex(0)
				->setCellValue("A" . $baris, $no++)
				->setCellValue("B" . $baris, $pelanggan->kode_pelanggan)
				->setCellValue("C" . $baris, $pelanggan->nama_pelanggan)
				->setCellValue("D" . $baris, $pelanggan->alamat_pelanggan)
				->setCellValue("E" . $baris, $pelanggan->no_telp);
			$baris++;
		}
		//3.1 Kosmetik
		$file->setActiveSheetIndex(0)
			->getStyle("A2:E".--$baris)
			->applyFromArray($this->borderStyle());
		//otomatis menyesuaikan lebar kolong
		$file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
		//4. Create Excel dan Download
		$writer = new Xlsx($file);
		$filename = $filename . ".xlsx";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment;filename=\"$filename\"");
		header("Cache-Control: max-age=0");
		$writer->save("php://output");
	}

	private function borderStyle() {
		return array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '00000000'),
				),
			),
		);
	}

	private function header() {
		return array(
			'font' => array(
				'bold' => true,
				'size' => 12
			),
			'alignment' => array(
				'horizontal' => "center",
			),
		);
	}

	private function setFont($size = 12, $bold = false, $alignment = "left") {
		return array(
			'font' => array(
				'bold' => $bold,
				'size' => $size
			),
			'alignment' => array(
				'horizontal' => $alignment,
			),
		);
	}

	private function dataAlign($align) {
		return array(
			'alignment' => array(
				'horizontal' => $align,
			),
		);
	}
}
