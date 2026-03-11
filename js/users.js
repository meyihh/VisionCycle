// =====================================
//  VisionCycle – Users Logic
// =====================================

// ── User Data ──
const users = [
    { id:1,  name:'Juan Dela Cruz',       username:'juan123',         email:'juandelacruz@gmail.com',         scans:15, registered:'2025-12-15 05:22:25' },
    { id:2,  name:'Maria Cruz',           username:'mariaaa31',       email:'cruzmaria@gmail.com',             scans:8,  registered:'2025-12-28 06:06:50' },
    { id:3,  name:'Joshua Reyes',         username:'joshua25!',       email:'joshua_reyes@gmail.com',         scans:9,  registered:'2025-12-30 09:46:16' },
    { id:4,  name:'Luis Aquino',          username:'aquino_luis12',   email:'aquinoluisss12@gmail.com',       scans:12, registered:'2026-02-11 14:07:16' },
    { id:5,  name:'Krizel Ann Ramos',     username:'krizel_ann',      email:'ramos_krizelann@gmail.com',      scans:14, registered:'2026-02-12 10:54:32' },
    { id:6,  name:'Joy Bautista',         username:'joyyy28',         email:'bautista_joy28@gmail.com',       scans:8,  registered:'2026-02-14 12:30:13' },
    { id:7,  name:'Christian Hernandez',  username:'chris_hernandez', email:'christianhernandez23@gmail.com', scans:9,  registered:'2026-02-20 12:05:24' },
    { id:8,  name:'James Torres',         username:'jamesss_30',      email:'james_torres0430@gmail.com',     scans:11, registered:'2026-02-22 13:04:31' },
    { id:9,  name:'Mark Mendoza',         username:'mark1201',        email:'markmendoza@gmail.com',          scans:10, registered:'2026-02-24 11:59:04' },
    { id:10, name:'Andrea Mae Garcia',    username:'andreamae',       email:'andreamaegarcia@gmail.com',      scans:8,  registered:'2026-02-27 12:48:17' },
    { id:11, name:'Juan Santos',          username:'juannn',          email:'santos_juan@gmail.com',          scans:13, registered:'2026-02-28 12:01:55' },
];

// ── Classification History per user ──
const histories = {
    1: [
        { classId:1,  item:'Plastic Bottle',    category:'Recyclable',     date:'2026-02-14' },
        { classId:2,  item:'Cardboard Box',     category:'Recyclable',     date:'2026-02-17' },
        { classId:3,  item:'Styrofoam Cup',     category:'Non-Recyclable', date:'2026-02-17' },
        { classId:4,  item:'Eggshells',         category:'Compostable',    date:'2026-02-20' },
        { classId:5,  item:'Newspaper',         category:'Recyclable',     date:'2026-02-22' },
        { classId:6,  item:'Glass Jar',         category:'Recyclable',     date:'2026-02-23' },
        { classId:7,  item:'Plastic Straw',     category:'Non-Recyclable', date:'2026-02-24' },
        { classId:8,  item:'Aluminum Soda Can', category:'Recyclable',     date:'2026-02-25' },
        { classId:9,  item:'Paper Towel',       category:'Non-Recyclable', date:'2026-02-26' },
        { classId:10, item:'Food Waste',        category:'Compostable',    date:'2026-02-27' },
        { classId:11, item:'Coffee Grounds',    category:'Compostable',    date:'2026-02-28' },
        { classId:12, item:'Candy Wrapper',     category:'Non-Recyclable', date:'2026-03-01' },
        { classId:13, item:'Plastic Bottle',    category:'Recyclable',     date:'2026-03-02' },
        { classId:14, item:'Cardboard Box',     category:'Recyclable',     date:'2026-03-03' },
        { classId:15, item:'Eggshells',         category:'Compostable',    date:'2026-03-04' },
    ],
    2: [
        { classId:1, item:'Glass Jar',   category:'Recyclable',     date:'2026-02-17' },
        { classId:2, item:'Food Waste',  category:'Compostable',    date:'2026-02-18' },
        { classId:3, item:'Paper Towel', category:'Non-Recyclable', date:'2026-02-19' },
        { classId:4, item:'Newspaper',   category:'Recyclable',     date:'2026-02-20' },
        { classId:5, item:'Eggshells',   category:'Compostable',    date:'2026-02-21' },
        { classId:6, item:'Soda Can',    category:'Recyclable',     date:'2026-02-22' },
        { classId:7, item:'Plastic Bag', category:'Non-Recyclable', date:'2026-02-23' },
        { classId:8, item:'Styrofoam',   category:'Non-Recyclable', date:'2026-02-24' },
    ],
};

// Default history for users without specific data
function getHistory(userId) {
    if (histories[userId]) return histories[userId];
    return [
        { classId:1, item:'Plastic Bottle', category:'Recyclable',     date:'2026-02-14' },
        { classId:2, item:'Cardboard Box',  category:'Recyclable',     date:'2026-02-17' },
        { classId:3, item:'Styrofoam Cup',  category:'Non-Recyclable', date:'2026-02-17' },
        { classId:4, item:'Eggshells',      category:'Compostable',    date:'2026-02-20' },
        { classId:5, item:'Newspaper',      category:'Recyclable',     date:'2026-02-22' },
    ];
}

let filteredUsers = [...users];

// ── Render Users Table ──
function renderTable() {
    const tbody = document.getElementById('userTableBody');
    tbody.innerHTML = filteredUsers.map(u => `
        <tr>
            <td>${u.id}</td>
            <td>${u.name}</td>
            <td>${u.username}</td>
            <td>${u.email}</td>
            <td>${u.scans}</td>
            <td>${u.registered}</td>
            <td><button class="view-details-btn" onclick="openModal(${u.id})">View Details</button></td>
        </tr>
    `).join('');
    document.getElementById('totalCount').textContent = users.length;
}

// ── Filter & Sort ──
function filterUsers() {
    const q    = document.getElementById('searchInput').value.toLowerCase();
    const sort = document.getElementById('sortSelect').value;

    filteredUsers = users.filter(u =>
        !q || u.name.toLowerCase().includes(q) || u.email.toLowerCase().includes(q)
    );

    if (sort === 'name_asc')   filteredUsers.sort((a,b) => a.name.localeCompare(b.name));
    if (sort === 'name_desc')  filteredUsers.sort((a,b) => b.name.localeCompare(a.name));
    if (sort === 'scans_desc') filteredUsers.sort((a,b) => b.scans - a.scans);
    if (sort === 'scans_asc')  filteredUsers.sort((a,b) => a.scans - b.scans);
    if (sort === 'id_asc')     filteredUsers.sort((a,b) => a.id - b.id);

    renderTable();
}

// ── Init ──
renderTable();