<?php

class Kategori_model extends CI_Model {
	//methos untuk menampilkan data buku
	public function showKategori(){
		$query =$this->db->get('kategori');
		return $query->result_array();
	}

	//method untuk hapus data buku berdasarkan id
	public function delKategori($idkategori){
		$this->db->delete('kategori', array("idkategori" => $idkategori));
	}

	//method untuk mencari data buku berdasarkan key
	public function findbook($key){
		$query = $this->db->query("SELECT * FROM books WHERE judul LIKE '%$key')
			OR pengarang LIKE '%$key%'
			OR penerbit LIKE '%$key%'
			OR sinopsis LIKE '%$key%'
			OR thnterbit LIKE '%$key%' ");

	return $query->result_array(); //jika result >1
}

//method untuk insert data buku ke tabel 'books'
public function insertKategori ($kategori) 	{
	$data = array(
		"kategori" => $kategori
	);
	$query = $this->db->insert('kategori', $data);
}

//method untuk membaca data kategori buku dari tabel 'kategori'
public function getKategori (){
	$query = $this->db->get('kategori');
	return $query ->result_array();
}

//mothod untuk menghitung jumlah buku berdasarkan idkategori
public function countByCat($idkategori){
	$query = $this->db->query("SELECT count(*) as jum FROM books WHERE idkategori ='$idkategori'");
}
}
?>