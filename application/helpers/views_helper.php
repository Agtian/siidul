<?php
function views_input($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_input";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_input";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_input";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_input";
			break;
		case 5:
			// ICU
			return "icu/v_input";
			break;
		case 6:
			// IBS
			return "ibs/v_input";
			break;
		case 7:
			// IGD
			return "igd/v_input";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_input";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_input";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_input";
			break;
		case 11:
			// CSSD
			return "cssd/v_input";
			break;
		case 12:
			// VCT
			return "vct/v_input";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_input";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_input";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_input";
			break;
		case 16:
			// PPI
			return "ppi/v_input";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_input";
			break;
		case 18:
			// Gizi
			return "gizi/v_input";
			break;
		case 19:
			// Gakin
			return "gakin/v_input";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_input";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_input";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_input";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_input";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_input";
			break;
		case 10025:
			// cs
			return "rawatinap/v_input";
			break;
		case 10026:
			// komdik
			return "rawatinap/v_input";
			break;
		case 10028:
			// pdeit
			return "pdeit/v_input";
			break;
		case 10029:
			// pkrs
			return "pkrs/v_input";
			break;


		default:
			// default
			return "default/v_input";
			break;
	}
}

function views_evaluasi()
{
	return "default/v_evaluasi";
}

function views_evaluasi_capaian()
{
	return "default/v_index_evaluasi_capaian";
}

function views_tabel_capaian_evaluasi(){
	return "default/v_get_evaluasi_capaian";

}

function views_ubah($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_ubah";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_ubah";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_ubah";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_ubah";
			break;
		case 5:
			// ICU
			return "icu/v_ubah";
			break;
		case 6:
			// IBS
			return "ibs/v_ubah";
			break;
		case 7:
			// IGD
			return "igd/v_ubah";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_ubah";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_ubah";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_ubah";
			break;
		case 11:
			// CSSD
			return "cssd/v_ubah";
			break;
		case 12:
			// VCT
			return "vct/v_ubah";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_ubah";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_ubah";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_ubah";
			break;
		case 16:
			// PPI
			return "ppi/v_ubah";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_ubah";
			break;
		case 18:
			// Gizi
			return "gizi/v_ubah";
			break;
		case 19:
			// Gakin
			return "gakin/v_ubah";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_ubah";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_ubah";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_ubah";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_ubah";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_ubah";
			break;
		case 10025:
			// cs
			return "rawatinap/v_ubah";
			break;
		case 10026:
			// komdik
			return "rawatinap/v_ubah";
			break;
		case 10028:
			// pdeit
			return "pdeit/v_ubah";
			break;
		case 10029:
			// pkrs
			return "pkrs/v_ubah";
			break;

		default:
			// default form ubah
			return "default/v_ubah";
			break;
	}
}




function views_export_bulanan($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_bulanan";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_bulanan";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_bulanan";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_bulanan";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_bulanan";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_bulanan";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_bulanan";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_bulanan";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_bulanan";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_bulanan";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_bulanan";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_bulanan";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_bulanan";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_bulanan";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_bulanan";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_bulanan";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_bulanan";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_bulanan";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_bulanan";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_bulanan";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_bulanan";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_bulanan";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_bulanan";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_bulanan";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_bulanan";
			break;
		case 35:
			// Pengemudi
			return "pengemudi/export/v_export_bulanan";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_bulanan";
			break;
		default:
			return "general/export/v_export_bulanan";
			break;
	}
}

function views_export_triwulan($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_triwulan";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_triwulan";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_triwulan";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_triwulan";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_triwulan";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_triwulan";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_triwulan";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_triwulan";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_triwulan";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_triwulan";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_triwulan";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_triwulan";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_triwulan";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_triwulan";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_triwulan";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_triwulan";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_triwulan";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_triwulan";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_triwulan";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_triwulan";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_triwulan";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_triwulan";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_triwulan";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_triwulan";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_triwulan";
			break;
		case 35:
			// Kasir
			return "pengemudi/export/v_export_triwulan";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_triwulan";
			break;
		default:
			// general
			return "general/export/v_export_triwulan";
			break;
	}
}

function views_export_semester($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_semester";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_semester";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_semester";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_semester";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_semester";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_semester";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_semester";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_semester";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_semester";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_semester";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_semester";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_semester";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_semester";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_semester";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_semester";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_semester";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_semester";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_semester";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_semester";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_semester";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_semester";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_semester";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_semester";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_semester";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_semester";
			break;
		case 35:
			// Kasir
			return "pengemudi/export/v_export_semester";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_semester";
			break;
		default:
			return "general/export/v_export_semester";
			break;
	}
}

function views_export_tahunan($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_tahunan";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_tahunan";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_tahunan";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_tahunan";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_tahunan";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_tahunan";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_tahunan";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_tahunan";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_tahunan";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_tahunan";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_tahunan";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_tahunan";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_tahunan";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_tahunan";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_tahunan";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_tahunan";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_tahunan";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_tahunan";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_tahunan";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_tahunan";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_tahunan";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_tahunan";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_tahunan";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_tahunan";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_tahunan";
			break;
		case 35:
			// Kasir
			return "pengemudi/export/v_export_tahunan";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_tahunan";
			break;
		default:
			// general
			return "general/export/v_export_tahunan";
			break;
	}
}

function views_export_capaian($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_capaian";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_capaian";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_capaian";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_capaian";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_capaian";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_capaian";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_capaian";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_capaian";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_capaian";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_capaian";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_capaian";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_capaian";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_capaian";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_capaian";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_capaian";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_capaian";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_capaian";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_capaian";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_capaian";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_capaian";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_capaian";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_capaian";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_capaian";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_capaian";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_capaian";
			break;
		case 35:
			// Kasir
			return "pengemudi/export/v_export_capaian";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_capaian";
			break;
		default:
			return "general/export/v_export_capaian";
			break;
	}
}

function views_export_grafik($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_capaian";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_capaian";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_capaian";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_grafik";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_capaian";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_capaian";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_capaian";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_capaian";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_capaian";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_capaian";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_capaian";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_capaian";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_capaian";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_capaian";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_capaian";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_capaian";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_capaian";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_capaian";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_capaian";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_capaian";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_capaian";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_capaian";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_capaian";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_capaian";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_capaian";
			break;
		case 35:
			// Kasir
			return "pengemudi/export/v_export_capaian";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_capaian";
			break;
		default:
			return "general/export/v_export_capaian";
			break;
	}
}




function views_export_triwulan_iii_form_dewas($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/export/v_export_triwulan_iii_form_dewas";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/export/v_export_triwulan_iii_form_dewas";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/export/v_export_triwulan_iii_form_dewas";
			break;
		case 4:
			// Cempaka
			return "cempaka/export/v_export_triwulan_iii_form_dewas";
			break;
		case 5:
			// ICU
			return "icu/export/v_export_triwulan_iii_form_dewas";
			break;
		case 6:
			// IBS
			return "ibs/export/v_export_triwulan_iii_form_dewas";
			break;
		case 7:
			// IGD
			return "igd/export/v_export_triwulan_iii_form_dewas";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/export/v_export_triwulan_iii_form_dewas";
			break;
		case 9:
			// Farmasi
			return "farmasi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/export/v_export_triwulan_iii_form_dewas";
			break;
		case 11:
			// CSSD
			return "cssd/export/v_export_triwulan_iii_form_dewas";
			break;
		case 12:
			// VCT
			return "vct/export/v_export_triwulan_iii_form_dewas";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/export/v_export_triwulan_iii_form_dewas";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/export/v_export_triwulan_iii_form_dewas";
			break;
		case 16:
			// PPI
			return "ppi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 17:
			// Radiologi
			return "radiologi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 18:
			// Gizi
			return "gizi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 19:
			// Gakin
			return "gakin/export/v_export_triwulan_iii_form_dewas";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/export/v_export_triwulan_iii_form_dewas";
			break;
		case 21:
			// Keuangan
			return "keuangan/export/v_export_triwulan_iii_form_dewas";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/export/v_export_triwulan_iii_form_dewas";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/export/v_export_triwulan_iii_form_dewas";
			break;
		case 32:
			// Kasir
			return "kasir/export/v_export_triwulan_iii_form_dewas";
			break;
		case 35:
			// Kasir
			return "pengemudi/export/v_export_triwulan_iii_form_dewas";
			break;
		case 43:
			// Diklat
			return "diklat/export/v_export_triwulan_iii_form_dewas";
			break;
		default:
			return "general/export/v_export_triwulan_iii_form_dewas";
			break;
	}
}




function views_rekap_bulanan($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_bulanan_tabel";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_bulanan_tabel";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_bulanan_tabel";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_bulanan_tabel";
			break;
		case 5:
			// ICU
			return "icu/v_bulanan_tabel";
			break;
		case 6:
			// IBS
			return "ibs/v_bulanan_tabel";
			break;
		case 7:
			// IGD
			return "igd/v_bulanan_tabel";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_bulanan_tabel";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_bulanan_tabel";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_bulanan_tabel";
			break;
		case 11:
			// CSSD
			return "cssd/v_bulanan_tabel";
			break;
		case 12:
			// VCT
			return "vct/v_bulanan_tabel";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_bulanan_tabel";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_bulanan_tabel";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_bulanan_tabel";
			break;
		case 16:
			// PPI
			return "ppi/v_bulanan_tabel";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_bulanan_tabel";
			break;
		case 18:
			// Gizi
			return "gizi/v_bulanan_tabel";
			break;
		case 19:
			// Gakin
			return "gakin/v_bulanan_tabel";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_bulanan_tabel";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_bulanan_tabel";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_bulanan_tabel";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_bulanan_tabel";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_bulanan_tabel";
			break;
		case 32:
			// Kasir
			return "kasir/v_bulanan_tabel";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_bulanan_tabel";
			break;
		case 43:
			// Diklat
			return "diklat/v_bulanan_tabel";
			break;
		default:
			return "general/v_bulanan_tabel";
			break;
	}
}

function views_rekap_triwulan($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_triwulan_tabel";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_triwulan_tabel";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_triwulan_tabel";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_triwulan_tabel";
			break;
		case 5:
			// ICU
			return "icu/v_triwulan_tabel";
			break;
		case 6:
			// IBS
			return "ibs/v_triwulan_tabel";
			break;
		case 7:
			// IGD
			return "igd/v_triwulan_tabel";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_triwulan_tabel";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_triwulan_tabel";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_triwulan_tabel";
			break;
		case 11:
			// CSSD
			return "cssd/v_triwulan_tabel";
			break;
		case 12:
			// VCT
			return "vct/v_triwulan_tabel";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_triwulan_tabel";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_triwulan_tabel";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_triwulan_tabel";
			break;
		case 16:
			// PPI
			return "ppi/v_triwulan_tabel";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_triwulan_tabel";
			break;
		case 18:
			// Gizi
			return "gizi/v_triwulan_tabel";
			break;
		case 19:
			// Gakin
			return "gakin/v_triwulan_tabel";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_triwulan_tabel";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_triwulan_tabel";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_triwulan_tabel";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_triwulan_tabel";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_triwulan_tabel";
			break;
		case 32:
			// Kasir
			return "kasir/v_triwulan_tabel";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_triwulan_tabel";
			break;
		case 43:
			// Diklat
			return "diklat/v_triwulan_tabel";
			break;
		default:
			return "general/v_triwulan_tabel";
			break;
	}
}

function views_rekap_semester($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_semester_tabel";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_semester_tabel";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_semester_tabel";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_semester_tabel";
			break;
		case 5:
			// ICU
			return "icu/v_semester_tabel";
			break;
		case 6:
			// IBS
			return "ibs/v_semester_tabel";
			break;
		case 7:
			// IGD
			return "igd/v_semester_tabel";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_semester_tabel";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_semester_tabel";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_semester_tabel";
			break;
		case 11:
			// CSSD
			return "cssd/v_semester_tabel";
			break;
		case 12:
			// VCT
			return "vct/v_semester_tabel";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_semester_tabel";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_semester_tabel";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_semester_tabel";
			break;
		case 16:
			// PPI
			return "ppi/v_semester_tabel";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_semester_tabel";
			break;
		case 18:
			// Gizi
			return "gizi/v_semester_tabel";
			break;
		case 19:
			// Gakin
			return "gakin/v_semester_tabel";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_semester_tabel";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_semester_tabel";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_semester_tabel";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_semester_tabel";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_semester_tabel";
			break;
		case 32:
			// Kasir
			return "kasir/v_semester_tabel";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_semester_tabel";
			break;
		case 43:
			// Diklat
			return "diklat/v_semester_tabel";
			break;
		default:
			return "general/v_semester_tabel";
			break;
	}
}

function views_rekap_tahunan($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_tahunan_tabel";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_tahunan_tabel";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_tahunan_tabel";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_tahunan_tabel";
			break;
		case 5:
			// ICU
			return "icu/v_tahunan_tabel";
			break;
		case 6:
			// IBS
			return "ibs/v_tahunan_tabel";
			break;
		case 7:
			// IGD
			return "igd/v_tahunan_tabel";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_tahunan_tabel";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_tahunan_tabel";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_tahunan_tabel";
			break;
		case 11:
			// CSSD
			return "cssd/v_tahunan_tabel";
			break;
		case 12:
			// VCT
			return "vct/v_tahunan_tabel";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_tahunan_tabel";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_tahunan_tabel";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_tahunan_tabel";
			break;
		case 16:
			// PPI
			return "ppi/v_tahunan_tabel";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_tahunan_tabel";
			break;
		case 18:
			// Gizi
			return "gizi/v_tahunan_tabel";
			break;
		case 19:
			// Gakin
			return "gakin/v_tahunan_tabel";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_tahunan_tabel";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_tahunan_tabel";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_tahunan_tabel";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_tahunan_tabel";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_tahunan_tabel";
			break;
		case 32:
			// Kasir
			return "kasir/v_tahunan_tabel";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_tahunan_tabel";
			break;
		case 43:
			// Diklat
			return "diklat/v_tahunan_tabel";
			break;
		default:
			return "general/v_tahunan_tabel";
			break;
	}
}

function views_rekap_capaian($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_capaian";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_capaian";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_capaian";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_capaian";
			break;
		case 5:
			// ICU
			return "icu/v_capaian";
			break;
		case 6:
			// IBS
			return "ibs/v_capaian";
			break;
		case 7:
			// IGD
			return "igd/v_capaian";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_capaian";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_capaian";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_capaian";
			break;
		case 11:
			// CSSD
			return "cssd/v_capaian";
			break;
		case 12:
			// VCT
			return "vct/v_capaian";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_capaian";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_capaian";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_capaian";
			break;
		case 16:
			// PPI
			return "ppi/v_capaian";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_capaian";
			break;
		case 18:
			// Gizi
			return "gizi/v_capaian";
			break;
		case 19:
			// Gakin
			return "gakin/v_capaian";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_capaian";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_capaian";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_capaian";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_capaian";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_capaian";
			break;
		case 32:
			// Kasir
			return "kasir/v_capaian";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_capaian";
			break;
		case 43:
			// Diklat
			return "diklat/v_capaian";
			break;
		default:
			return "general/v_capaian";
			break;
	}
}
function views_grafik_capaian($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_grafik";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_grafik";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_grafik";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_grafik";
			break;
		case 5:
			// ICU
			return "icu/v_grafik";
			break;
		case 6:
			// IBS
			return "ibs/v_grafik";
			break;
		case 7:
			// IGD
			return "igd/v_grafik";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_grafik";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_grafik";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_grafik";
			break;
		case 11:
			// CSSD
			return "cssd/v_grafik";
			break;
		case 12:
			// VCT
			return "vct/v_grafik";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_grafik";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_grafik";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_grafik";
			break;
		case 16:
			// PPI
			return "ppi/v_grafik";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_grafik";
			break;
		case 18:
			// Gizi
			return "gizi/v_grafik";
			break;
		case 19:
			// Gakin
			return "gakin/v_grafik";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_grafik";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_grafik";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_grafik";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_grafik";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_grafik";
			break;
		case 10028:
			// pdeit
			return "pdeit/v_grafik";
			break;
		case 10029:
			// pkrs
			return "pkrs/v_grafik";
			break;
		case 32:
			// Kasir
			return "kasir/v_grafik";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_grafik";
			break;
		case 43:
			// Diklat
			return "diklat/v_grafik";
			break;
		default:
			return "general/v_grafik";
			break;
	}
}

function views_rekap_triwulan_table_dewas($id)
{
	switch ($id) {
		case 1:
			// Bank Darah
			return "bankdarah/v_triwulan_tabel_dewas";
			break;
		case 2:
			// Rekam Medis
			return "rekammedis/v_triwulan_tabel_dewas";
			break;
		case 3:
			// Rawat Inap
			return "rawatinap/v_triwulan_tabel_dewas";
			break;
		case 4:
			// Cempaka
			return "cempaka/v_triwulan_tabel_dewas";
			break;
		case 5:
			// ICU
			return "icu/v_triwulan_tabel_dewas";
			break;
		case 6:
			// IBS
			return "ibs/v_triwulan_tabel_dewas";
			break;
		case 7:
			// IGD
			return "igd/v_triwulan_tabel_dewas";
			break;
		case 8:
			// Laboratorium
			return "laboratorium/v_triwulan_tabel_dewas";
			break;
		case 9:
			// Farmasi
			return "farmasi/v_triwulan_tabel_dewas";
			break;
		case 10:
			// Elektromedik
			return "elektromedik/v_triwulan_tabel_dewas";
			break;
		case 11:
			// CSSD
			return "cssd/v_triwulan_tabel_dewas";
			break;
		case 12:
			// VCT
			return "vct/v_triwulan_tabel_dewas";
			break;
		case 13:
			// Pemulasan Jenazah & Ambulance
			return "kamar_jenazah/v_triwulan_tabel_dewas";
			break;
		case 14:
			// Sanitasi
			return "sanitasi/v_triwulan_tabel_dewas";
			break;
		case 15:
			// Rawat Jalan
			return "rawat_jalan/v_triwulan_tabel_dewas";
			break;
		case 16:
			// PPI
			return "ppi/v_triwulan_tabel_dewas";
			break;
		case 17:
			// Radiologi
			return "radiologi/v_triwulan_tabel_dewas";
			break;
		case 18:
			// Gizi
			return "gizi/v_triwulan_tabel_dewas";
			break;
		case 19:
			// Gakin
			return "gakin/v_triwulan_tabel_dewas";
			break;
		case 20:
			// Kepegawaian
			return "kepegawaian/v_triwulan_tabel_dewas";
			break;
		case 21:
			// Keuangan
			return "keuangan/v_triwulan_tabel_dewas";
			break;
		case 22:
			// Fisioterapi
			return "fisioterapi/v_triwulan_tabel_dewas";
			break;
		case 23:
			// Fisioterapi Donorojo
			return "fisioterapi_donorojo/v_triwulan_tabel_dewas";
			break;
		case 24:
			// Hemodialisa
			return "hemodialisa/v_triwulan_tabel_dewas";
			break;
		case 32:
			// Kasir
			return "kasir/v_triwulan_tabel_dewas";
			break;
		case 35:
			// Kasir
			return "pengemudi/v_triwulan_tabel_dewas";
			break;
		case 43:
			// Diklat
			return "diklat/v_triwulan_tabel_dewas";
			break;
		default:
			return "general/v_triwulan_tabel_dewas";
			break;
	}
}
