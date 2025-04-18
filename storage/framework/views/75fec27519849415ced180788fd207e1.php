<div class="modal fade" id="editPendudukModal" tabindex="-1" aria-labelledby="editPendudukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="editPendudukForm" method="POST" action="{">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editPendudukModalLabel">Edit Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <?php if(isset($penduduk)): ?>
                        
                        <input type="hidden" id="edit_id" name="id" value="<?php echo e($penduduk->id); ?>">
                    <?php else: ?>
                        <p>Data penduduk tidak tersedia di modal ini.</p>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nik" class="form-label text-secondary">NIK</label>
                            <input type="text" name="nik" class="form-control" id="edit_nik" required value="<?php echo e(old('nik', $penduduk->nik)); ?>" placeholder="Masukkan 16 digit NIK">
                            <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_no_kk_sebelumnya" class="form-label text-secondary">No KK Sebelumnya</label>
                            <input type="text" name="no_kk_sebelumnya" class="form-control" id="edit_no_kk_sebelumnya" placeholder="Masukkan nomor KK sebelumnya jika ada" value="<?php echo e(old('no_kk_sebelumnya', $penduduk->no_kk_sebelumnya)); ?>">
                            <?php $__errorArgs = ['no_kk_sebelumnya'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nama" class="form-label text-secondary">Nama</label>
                            <input type="text" name="nama" class="form-control" id="edit_nama" required value="<?php echo e(old('nama', $penduduk->nama)); ?>" placeholder="Masukkan nama lengkap">
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_jenis_kelamin" class="form-label text-secondary">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" id="edit_jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <?php $__currentLoopData = \App\Enums\JenisKelamin::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisKelamin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jenisKelamin->value); ?>" <?php echo e(old('jenis_kelamin', $penduduk->jenis_kelamin) == $jenisKelamin->value ? 'selected' : ''); ?>>
                                        <?php echo e($jenisKelamin->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_email" class="form-label text-secondary">Email</label>
                            <input type="email" name="email" class="form-control" id="edit_email" required placeholder="nama@contoh.com" value="<?php echo e(old('email', $penduduk->email)); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_agama" class="form-label text-secondary">Agama</label>
                            <select name="agama" class="form-select" id="edit_agama" required>
                                <option value="">Pilih Agama</option>
                                <?php $__currentLoopData = \App\Enums\Agama::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agama->value); ?>" <?php echo e(old('agama', $penduduk->agama) == $agama->value ? 'selected' : ''); ?>>
                                        <?php echo e($agama->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tempat_lahir" class="form-label text-secondary">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="edit_tempat_lahir" required value="<?php echo e(old('tempat_lahir', $penduduk->tempat_lahir)); ?>" placeholder="Masukkan kota kelahiran">
                            <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_lahir" class="form-label text-secondary">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="edit_tanggal_lahir" required value="<?php echo e(old('tanggal_lahir', $penduduk->tanggal_lahir)); ?>">
                            <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_status_kawin" class="form-label text-secondary">Status Kawin</label>
                            <select name="status_kawin" class="form-select" id="edit_status_kawin" required>
                                <option value="">Pilih Status Kawin</option>
                                <?php $__currentLoopData = \App\Enums\StatusKawin::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKawin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($statusKawin->value); ?>" <?php echo e(old('status_kawin', $penduduk->status_kawin) == $statusKawin->value ? 'selected' : ''); ?>>
                                        <?php echo e($statusKawin->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['status_kawin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_status_keadaan" class="form-label text-secondary">Status Keadaan</label>
                            <select name="status_keadaan" class="form-select" id="edit_status_keadaan" required>
                                <option value="">Pilih Status Keadaan</option>
                                <?php $__currentLoopData = \App\Enums\StatusKeadaan::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKeadaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($statusKeadaan->value); ?>" <?php echo e(old('status_keadaan', $penduduk->status_keadaan) == $statusKeadaan->value ? 'selected' : ''); ?>>
                                        <?php echo e($statusKeadaan->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['status_keadaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_warga_negara" class="form-label text-secondary">Warga Negara</label>
                            <input type="text" name="warga_negara" class="form-control" id="edit_warga_negara" required value="<?php echo e(old('warga_negara', $penduduk->warga_negara)); ?>" placeholder="Contoh: WNI/WNA">
                            <?php $__errorArgs = ['warga_negara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_pendidikan_terakhir" class="form-label text-secondary">Pendidikan Terakhir</label>
                            <select name="pendidikan_terakhir" class="form-select" id="edit_pendidikan_terakhir" required>
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <?php $__currentLoopData = \App\Enums\Pendidikan::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendidikan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pendidikan->value); ?>" <?php echo e(old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == $pendidikan->value ? 'selected' : ''); ?>>
                                        <?php echo e($pendidikan->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['pendidikan_terakhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_ayah_nik" class="form-label text-secondary">NIK Ayah</label>
                            <input type="text" name="ayah_nik" class="form-control" id="edit_ayah_nik" placeholder="Masukkan 16 digit NIK ayah jika ada" value="<?php echo e(old('ayah_nik', $penduduk->ayah_nik)); ?>">
                            <?php $__errorArgs = ['ayah_nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_ibu_nik" class="form-label text-secondary">NIK Ibu</label>
                            <input type="text" name="ibu_nik" class="form-control" id="edit_ibu_nik" placeholder="Masukkan 16 digit NIK ibu jika ada" value="<?php echo e(old('ibu_nik', $penduduk->ibu_nik)); ?>">
                            <?php $__errorArgs = ['ibu_nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nama_ayah" class="form-label text-secondary">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" id="edit_nama_ayah" required placeholder="Masukkan nama lengkap ayah" value="<?php echo e(old('nama_ayah', $penduduk->nama_ayah)); ?>">
                            <?php $__errorArgs = ['nama_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_nama_ibu" class="form-label text-secondary">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" id="edit_nama_ibu" required placeholder="Masukkan nama lengkap ibu" value="<?php echo e(old('nama_ibu', $penduduk->nama_ibu)); ?>">
                            <?php $__errorArgs = ['nama_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_hubungan_warga" class="form-label text-secondary">Hubungan Warga</label>
                            <select name="hubungan_warga" class="form-select" id="edit_hubungan_warga" required>
                                <option value="">Pilih Hubungan Warga</option>
                                <?php $__currentLoopData = \App\Enums\HubunganWarga::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hubunganWarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($hubunganWarga->value); ?>" <?php echo e(old('hubungan_warga', $penduduk->hubungan_warga) == $hubunganWarga->value ? 'selected' : ''); ?>>
                                        <?php echo e($hubunganWarga->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['hubungan_warga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_golongan_darah" class="form-label text-secondary">Golongan Darah</label>
                            <select name="golongan_darah" class="form-select" id="edit_golongan_darah" required>
                                <option value="">Pilih Golongan Darah</option>
                                <?php $__currentLoopData = \App\Enums\GolonganDarah::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golonganDarah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($golonganDarah->value); ?>" <?php echo e(old('golongan_darah', $penduduk->golongan_darah) == $golonganDarah->value ? 'selected' : ''); ?>>
                                        <?php echo e($golonganDarah->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['golongan_darah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit_suku" class="form-label text-secondary">Suku</label>
                            <input type="text" name="suku" class="form-control" id="edit_suku" required value="<?php echo e(old('suku', $penduduk->suku)); ?>" placeholder="Contoh: Jawa, Sunda, dll">
                            <?php $__errorArgs = ['suku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="edit_status_rekam" class="form-label text-secondary">Status Rekam</label>
                            <select name="status_rekam" class="form-select" id="edit_status_rekam" required>
                                <option value="">Pilih Status Rekam</option>
                                <?php $__currentLoopData = \App\Enums\StatusRekam::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusRekam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($statusRekam->value); ?>" <?php echo e(old('status_rekam', $penduduk->status_rekam) == $statusRekam->value ? 'selected' : ''); ?>>
                                        <?php echo e($statusRekam->value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['status_rekam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="edit_ktp_el" class="form-label text-secondary">KTP Elektronik</label>
                            <select name="ktp_el" class="form-select" id="edit_ktp_el" required>
                                <option value="">Pilih KTP Elektronik</option>
                                <option value="1" <?php echo e(old('ktp_el', $penduduk->ktp_el) == '1' ? 'selected' : ''); ?>>Ya</option>
                                <option value="0" <?php echo e(old('ktp_el', $penduduk->ktp_el) == '0' ? 'selected' : ''); ?>>Tidak</option>
                            </select>
                            <?php $__errorArgs = ['ktp_el'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tempat_cetak_ktp" class="form-label text-secondary">Tempat Cetak KTP</label>
                            <input type="text" name="tempat_cetak_ktp" class="form-control" id="edit_tempat_cetak_ktp" placeholder="Contoh: Kantor Kecamatan Setiabudi" value="<?php echo e(old('tempat_cetak_ktp', $penduduk->tempat_cetak_ktp)); ?>">
                            <?php $__errorArgs = ['tempat_cetak_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_cetak_ktp" class="form-label text-secondary">Tanggal Cetak KTP</label>
                            <input type="date" name="tanggal_cetak_ktp" class="form-control" id="edit_tanggal_cetak_ktp" value="<?php echo e(old('tanggal_cetak_ktp', $penduduk->tanggal_cetak_ktp)); ?>">
                            <?php $__errorArgs = ['tanggal_cetak_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_pekerjaan" class="form-label text-secondary">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="edit_pekerjaan" required value="<?php echo e(old('pekerjaan', $penduduk->pekerjaan)); ?>" placeholder="Contoh: Guru, Wiraswasta, PNS, dll">
                        <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="edit_alamat_sekarang" class="form-label text-secondary">Alamat Sekarang</label>
                        <textarea name="alamat_sekarang" class="form-control" id="edit_alamat_sekarang" rows="2" required placeholder="Masukkan alamat lengkap tempat tinggal saat ini"><?php echo e(old('alamat_sekarang', $penduduk->alamat_sekarang)); ?></textarea>
                        <?php $__errorArgs = ['alamat_sekarang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="edit_alamat_sebelumnya" class="form-label text-secondary">Alamat Sebelumnya</label>
                        <textarea name="alamat_sebelumnya" class="form-control" id="edit_alamat_sebelumnya" rows="2" placeholder="Masukkan alamat tempat tinggal sebelumnya jika ada"><?php echo e(old('alamat_sebelumnya', $penduduk->alamat_sebelumnya)); ?></textarea>
                        <?php $__errorArgs = ['alamat_sebelumnya'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="edit_note" class="form-label text-secondary">Catatan</label>
                        <textarea name="note" class="form-control" id="edit_note" rows="2" placeholder="Informasi tambahan lainnya (opsional)"><?php echo e(old('note', $penduduk->note)); ?></textarea>
                        <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('editPendudukModal'));
            modal.show();
        });
    </script>
<?php endif; ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/penduduk/edit.blade.php ENDPATH**/ ?>