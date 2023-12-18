function submitForm() {
    // Implementasikan logika pengiriman formulir dan validasi data

    // Untuk mendapatkan nilai yang diinputkan
    const name = document.getElementById('name').value;
    const age = document.getElementById('age').value;

    // Memeriksa setiap checkbox
    const membershipCheckbox = document.getElementById('membership');
    const nonMembershipCheckbox = document.getElementById('nonMembership');

    let membershipType = '';
    if (membershipCheckbox.checked) {
        membershipType = 'Member';
    } else if (nonMembershipCheckbox.checked) {
        membershipType = 'Non-Member';
    }

    // Mendapatkan nilai radio button yang dipilih untuk gender
    const gender = document.querySelector('input[name="gender"]:checked').value;

    // Validasi usia
    if (age < 18) {
        alert('Pengunjung harus berusia 18 tahun atau lebih.');
        return;
    }

    // Untuk menambahkan data pada tabel
    const table = document.getElementById('visitorTable').getElementsByTagName('tbody')[0];
    const row = table.insertRow(-1);
    const cell1 = row.insertCell(0);
    const cell2 = row.insertCell(1);
    const cell3 = row.insertCell(2);
    const cell4 = row.insertCell(3);
    cell1.innerHTML = name;
    cell2.innerHTML = age;
    cell3.innerHTML = membershipType;
    cell4.innerHTML = gender;

   
    setCookie('userName', name, 1); 
    console.log('Nilai Cookie:', getCookie('userName'));

    setLocalStorage('userAge', age);
    console.log('Nilai Penyimpanan Lokal:', getLocalStorage('userAge'));
}

function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = `${name}=${value}; expires=${expires}; path=/`;
}

function getCookie(name) {
    const cookies = document.cookie.split('; ');
    for (const cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split('=');
        if (cookieName === name) {
            return cookieValue;
        }
    }
    return null;
}

function setLocalStorage(key, value) {
    localStorage.setItem(key, value);
}

function getLocalStorage(key) {
    return localStorage.getItem(key);
}

