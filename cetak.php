<?php
require('fpdf.php');

class Database {
  private $host;
  private $user;
  private $pass;
  private $dbname;
  private $conn;

  public function __construct($host, $user, $pass, $dbname) {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->dbname = $dbname;

    $this->connect();
  }

  private function connect() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function query($sql) {
    return $this->conn->query($sql);
  }

  public function close() {
    $this->conn->close();
  }
}

class PDF extends FPDF {
  private $db;

  public function __construct(Database $db) {
    parent::__construct();
    $this->db = $db;
  }

  public function Content($id_tanggapan) {
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(190, 10, 'Laporan Tanggapan', 0, 1, 'C');
    $this->Ln(10);
  
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'ID Tanggapan', 0, 0, 'L');
    $this->Cell(140, 10, $id_tanggapan, 0, 1, 'L');
  
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'ID Pengaduan', 0, 0, 'L');
    $sql = "SELECT id_pengaduan FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
    $result = $this->db->query($sql);
    $row = $result->fetch_assoc();
    $this->Cell(140, 10, $row['id_pengaduan'], 0, 1, 'L');
  
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'Tanggal', 0, 0, 'L');
    $sql = "SELECT tgl_tanggapan FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
    $result = $this->db->query($sql);
    $row = $result->fetch_assoc();
    $this->Cell(140, 10, $row['tgl_tanggapan'], 0, 1, 'L');
  
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'Tanggapan', 0, 0, 'L');
    $sql = "SELECT tanggapan FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
    $result = $this->db->query($sql);
    $row = $result->fetch_assoc();
    $this->MultiCell(140, 10, $row['tanggapan'], 0, 'L');
    $this->Ln();
  
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'ID Petugas', 0, 0, 'L');
    $sql = "SELECT id_petugas FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
    $result = $this->db->query($sql);
    $row = $result->fetch_assoc();
    $this->Cell(140, 10, $row['id_petugas'], 0, 1, 'L');
  
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'Status', 0, 0, 'L');
    $sql = "SELECT status FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
    $result = $this->db->query($sql);
    $row = $result->fetch_assoc();
    $this->Cell(140, 10, $row['status'], 0, 1, 'L');
  }
  
  
  
}

// Connect to the database
$db = new Database('localhost', 'root', '', 'pengaduan_masyarakat');

// Create a new PDF object
$pdf = new PDF($db);

// Add a new page
$pdf->AddPage();

// Output the header and content
$pdf->Header();
$pdf->Content($_GET['id']);

// Output the PDF
$pdf->Output();

// Close the database connection
$db->close();

$id_tanggapan = $_GET['id'];

?>