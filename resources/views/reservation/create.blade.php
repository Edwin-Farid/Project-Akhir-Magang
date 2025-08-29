<x-layout.default>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="/menu" class="text-primary hover:underline">Menu</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Tambah</span>
            </li>
        </ul>
    </div>

    <div class="panel mt-5" x-data="form">
        <form class="space-y-5" @submit.prevent="submitForm1()">
            <div class="grid grid-cols-2 gap-5">
                <div :class="[isSubmitForm1 ? (form1.name ? 'has-success' : 'has-error') : '']">
                    <label for="fullName">Nama Makanan</label>
                    <input id="fullName" type="text" placeholder="Contoh: Bakso" class="form-input"
                        x-model="form1.name" />
                    <template x-if="isSubmitForm1 && form1.name">
                        <p class="text-[#1abc9c] mt-1">Sudah sesuai!</p>
                    </template>
                    <template x-if="isSubmitForm1 && !form1.name">
                        <p class="text-danger mt-1">Mohon lengkapi data ini!</p>
                    </template>
                </div>
                <div :class="[isSubmitForm1 ? (form1.price ? 'has-success' : 'has-error') : '']">
                    <label for="fullPrice">Harga</label>
                    <input id="fullPrice" type="text" placeholder="Contoh: Rp 20.000" class="form-input"
                        x-model="form1.price" />
                    <template x-if="isSubmitForm1 && form1.price">
                        <p class="text-[#1abc9c] mt-1">Sudah sesuai!</p>
                    </template>
                    <template x-if="isSubmitForm1 && !form1.price">
                        <p class="text-danger mt-1">Mohon lengkapi data ini!</p>
                    </template>
                </div>
            </div>
            <button type="submit" class="btn btn-primary !mt-6">Simpan</button>
        </form>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                form1: {
                    name: '',
                    price: '',
                },
                isSubmitForm1: false,

                submitForm1() {
                    this.isSubmitForm1 = true;
                    if (this.form1.name && this.form1.price) {
                        //form validated success
                        this.showMessage('Data berhasil di simpan!');
                    }
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    </script>
</x-layout.default>
