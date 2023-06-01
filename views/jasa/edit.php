<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/jasa/updateJasa" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['jasa']['id']; ?>">

                <div class="card-body">

                    <div class="form-group">

                        <label >Kategori Data Jasa</label>

                        <select class="form-control" name="kategori_nama">

                            <option value="">Pilih Kategori</option>

                            <?php foreach ($data['kategori'] as $row) :?>

                                <option value="<?= $row['nama_kategori']; ?>" <?php if($data['jasa']['kategori_nama'] == $row['nama_kategori']) { echo "selected"; } ?>><?= $row['nama_kategori']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label >Data Daftar Jasa</label>

                        <input type="text" class="form-control" placeholder="masukkan data jasa..." name="nama_Jasa" value="<?= $data['jasa']['nama_jasa'];?>">

                    </div>

                    <div class="form-group">

                        <label >Deskripsi Jasa</label>

                        <input type="text" class="form-control" placeholder="masukkan deskripsi jasa..." name="nama_deskripsi" value="<?= $data['jasa']['nama_deskripsi'];?>">

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>