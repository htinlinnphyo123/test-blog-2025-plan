HSFileUpload.autoInit();
(function uploadError() {
    const { element } = HSFileUpload.getInstance('#hs-file-upload-with-limited-file-size', true);
    element.dropzone.on('error', (file, response) => {
      if (file.size > element.concatOptions.maxFilesize * 1024 * 1024) {
        const successEls = document.querySelectorAll('[data-hs-file-upload-file-success]');
        const errorEls = document.querySelectorAll('[data-hs-file-upload-file-error]');
  
        successEls.forEach((el) => el.style.display = 'none');
        errorEls.forEach((el) => el.style.display = '');
        HSStaticMethods.autoInit(['tooltip']);
      }
    });
  })();

