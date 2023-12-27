const selectImage = document.querySelector('.select-image');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('.img-area');

selectImage.addEventListener('click', function () {
    inputFile.click();
})

inputFile.addEventListener('change', function () {
    const image = this.files[0]
    if (image.size < 10000000) {
        const reader = new FileReader();
        reader.onload = () => {
            const allImg = imgArea.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea.appendChild(img);
            imgArea.classList.add('active');
            imgArea.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Ảnh không được vượt quá 10MB");
    }
})

// ảnh tin tức 1
const selectImage1 = document.querySelector('.select-image1');
const imgArea1 = document.querySelector('.img-area1');
const inputFile1 = document.querySelector('#file1');
selectImage1.addEventListener('click', function () {
    inputFile1.click();
})

inputFile1.addEventListener('change', function () {
    const image = this.files[0]
    if (image.size < 10000000) {
        const reader = new FileReader();
        reader.onload = () => {
            const allImg = imgArea1.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea1.appendChild(img);
            imgArea1.classList.add('active');
            imgArea1.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Ảnh không được vượt quá 10MB");
    }
})


// ảnh tin tức 2
const selectImage2 = document.querySelector('.select-image2');
const imgArea2 = document.querySelector('.img-area2');
const inputFile2 = document.querySelector('#file2');
selectImage2.addEventListener('click', function () {
    inputFile2.click();
})

inputFile2.addEventListener('change', function () {
    const image = this.files[0]
    if (image.size < 10000000) {
        const reader = new FileReader();
        reader.onload = () => {
            const allImg = imgArea2.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea2.appendChild(img);
            imgArea2.classList.add('active');
            imgArea2.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Ảnh không được vượt quá 10MB");
    }
})

// ảnh tin tức 3
const selectImage3 = document.querySelector('.select-image3');
const imgArea3 = document.querySelector('.img-area3');
const inputFile3 = document.querySelector('#file3');
selectImage3.addEventListener('click', function () {
    inputFile3.click();
})

inputFile3.addEventListener('change', function () {
    const image = this.files[0]
    if (image.size < 10000000) {
        const reader = new FileReader();
        reader.onload = () => {
            const allImg = imgArea3.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea3.appendChild(img);
            imgArea3.classList.add('active');
            imgArea3.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Ảnh không được vượt quá 10MB");
    }
})

// ảnh tin tức 4
const selectImage4 = document.querySelector('.select-image4');
const imgArea4 = document.querySelector('.img-area4');
const inputFile4 = document.querySelector('#file4');
selectImage4.addEventListener('click', function () {
    inputFile4.click();
})

inputFile4.addEventListener('change', function () {
    const image = this.files[0]
    if (image.size < 10000000) {
        const reader = new FileReader();
        reader.onload = () => {
            const allImg = imgArea4.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea4.appendChild(img);
            imgArea4.classList.add('active');
            imgArea4.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Ảnh không được vượt quá 10MB");
    }
})

// ảnh tin tức 5
const selectImage5 = document.querySelector('.select-image5');
const imgArea5 = document.querySelector('.img-area5');
const inputFile5 = document.querySelector('#file5');
selectImage5.addEventListener('click', function () {
    inputFile5.click();
})

inputFile5.addEventListener('change', function () {
    const image = this.files[0]
    if (image.size < 10000000) {
        const reader = new FileReader();
        reader.onload = () => {
            const allImg = imgArea5.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea5.appendChild(img);
            imgArea5.classList.add('active');
            imgArea5.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Ảnh không được vượt quá 10MB");
    }
})