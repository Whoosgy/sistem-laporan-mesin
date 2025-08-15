axios.get(`/maintenance/${id}`)
    .then(response => {
        console.log(response.data);
        // Lakukan sesuatu, misalnya tampilkan modal detail laporan
    })
    .catch(error => {
        console.error(error);
    });
  