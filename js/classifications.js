// =====================================
//  VisionCycle – Classifications Logic
// =====================================

const allCards = [
    { id:1,  name:'Plastic Bottle',    category:'Recyclable',     user:'Juan Dela Cruz',   date:'2026-02-14', userId:1, img:'drawable/plastic_bottles.jpg' },
    { id:2,  name:'Cardboard Box',     category:'Recyclable',     user:'Juan Dela Cruz',   date:'2026-02-15', userId:1, img:'drawable/cardboard_boxes.jpg' },
    { id:3,  name:'Styrofoam Cup',     category:'Non-Recyclable', user:'Maria Cruz',       date:'2026-02-15', userId:2, img:'drawable/styro_cup.jpg' },
    { id:4,  name:'Eggshells',         category:'Compostable',    user:'Joshua Reyes',     date:'2026-02-16', userId:3, img:'drawable/eggshells.jpg' },
    { id:5,  name:'Newspaper',         category:'Recyclable',     user:'Luis Aquino',      date:'2026-02-16', userId:4, img:'drawable/newspaper.jpg' },
    { id:6,  name:'Glass Jar',         category:'Recyclable',     user:'Maria Cruz',       date:'2026-02-17', userId:2, img:'drawable/glass_jar.png' },
    { id:7,  name:'Plastic Straw',     category:'Non-Recyclable', user:'Krizel Ann Ramos', date:'2026-02-17', userId:5, img:'drawable/plastic_straw.jpg' },
    { id:8,  name:'Aluminum Soda Can', category:'Recyclable',     user:'Joy Bautista',     date:'2026-02-18', userId:6, img:'drawable/soda_can.jpg' },
    { id:9,  name:'Paper Towel',       category:'Non-Recyclable', user:'Juan Dela Cruz',   date:'2026-02-18', userId:1, img:'drawable/paper_towel.png' },
    { id:10, name:'Aluminum Food Can', category:'Recyclable',     user:'Luis Aquino',      date:'2026-02-19', userId:4, img:'drawable/food_can.jpg' },
    { id:11, name:'Food Waste',        category:'Compostable',    user:'Maria Cruz',       date:'2026-02-19', userId:2, img:'drawable/food_waste.jpg' },
    { id:12, name:'Coffee Grounds',    category:'Compostable',    user:'Joshua Reyes',     date:'2026-02-20', userId:3, img:'drawable/coffee_grounds.png' },
    { id:13, name:'Plastic Bottle',    category:'Recyclable',     user:'Joy Bautista',     date:'2026-02-20', userId:6, img:'drawable/plastic_bottle2.png' },
    { id:14, name:'Eggshells',         category:'Compostable',    user:'Krizel Ann Ramos', date:'2026-02-21', userId:5, img:'drawable/eggshells2.jpg' },
    { id:15, name:'Candy Wrapper',     category:'Non-Recyclable', user:'Luis Aquino',      date:'2026-02-21', userId:4, img:'drawable/candy_wrapper.jpg' },
    { id:16, name:'Plastic Bottle',    category:'Recyclable',     user:'Juan Dela Cruz',   date:'2026-02-14', userId:1, img:'drawable/plastic_bottles.jpg' },
];

const PER_PAGE = 15;
let currentPage = 1;
let filtered = [...allCards];

// ── Badge HTML ──
function badgeHTML(cat) {
    if (cat === 'Recyclable')     return `<span class="badge-recyclable">Recyclable</span>`;
    if (cat === 'Non-Recyclable') return `<span class="badge-non-recyclable">Non-Recyclable</span>`;
    if (cat === 'Compostable')    return `<span class="badge-compostable">Compostable</span>`;
    return '';
}

// ── Render Cards ──
function renderCards() {
    const grid  = document.getElementById('cardsGrid');
    const start = (currentPage - 1) * PER_PAGE;
    const page  = filtered.slice(start, start + PER_PAGE);

    document.getElementById('showingText').textContent =
        `Showing ${filtered.length} result${filtered.length !== 1 ? 's' : ''}`;

    grid.innerHTML = page.map(c => `
        <div class="waste-card" onclick="openModal(${c.id})">
            <img class="waste-card-img" src="${c.img}" alt="${c.name}">
            <div class="waste-card-body">
                <div class="waste-card-name">${c.name}</div>
                ${badgeHTML(c.category)}
                <div class="waste-card-user">By: ${c.user}</div>
            </div>
        </div>
    `).join('');

    renderPagination();
}

// ── Render Pagination ──
function renderPagination() {
    const total = Math.ceil(filtered.length / PER_PAGE);
    const wrap  = document.getElementById('paginationWrap');
    if (total <= 1) { wrap.innerHTML = ''; return; }

    const pages = getPageNumbers(currentPage, total);
    let html = '';

    html += `<button class="page-btn prev-next ${currentPage === 1 ? 'disabled' : ''}" onclick="goPage(${currentPage - 1})">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
        Previous
    </button>`;

    html += pages.map(p =>
        p === '...'
            ? `<span class="page-gap">...</span>`
            : `<button class="page-btn ${p === currentPage ? 'active' : ''}" onclick="goPage(${p})">${p}</button>`
    ).join('');

    html += `<button class="page-btn prev-next ${currentPage === total ? 'disabled' : ''}" onclick="goPage(${currentPage + 1})">
        Next
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    </button>`;

    wrap.innerHTML = html;
}

// ── Page Numbers Logic ──
function getPageNumbers(cur, total) {
    if (total <= 7) return Array.from({length: total}, (_, i) => i + 1);
    if (cur <= 3)   return [1, 2, 3, '...', total];
    if (cur >= total - 2) return [1, '...', total - 2, total - 1, total];
    return [1, '...', cur - 1, cur, cur + 1, '...', total];
}

// ── Go to Page ──
function goPage(p) {
    const total = Math.ceil(filtered.length / PER_PAGE);
    if (p < 1 || p > total) return;
    currentPage = p;
    renderCards();
    window.scrollTo(0, 0);
}

// ── Filter Cards ──
function filterCards() {
    const q   = document.getElementById('searchInput').value.toLowerCase();
    const cat = document.getElementById('catFilter').value;
    filtered = allCards.filter(c => {
        const matchSearch = !q || c.name.toLowerCase().includes(q) || c.user.toLowerCase().includes(q);
        const matchCat    = !cat || c.category === cat;
        return matchSearch && matchCat;
    });
    currentPage = 1;
    renderCards();
}

// ── Open Detail Modal ──
function openModal(id) {
    const c = allCards.find(x => x.id === id);
    if (!c) return;
    document.getElementById('modalImg').src            = c.img;
    document.getElementById('modalImg').alt            = c.name;
    document.getElementById('modalName').textContent   = c.name;
    document.getElementById('modalDate').textContent   = c.date;
    document.getElementById('modalUser').textContent   = c.user;
    document.getElementById('modalUserId').textContent = c.userId;
    document.getElementById('modalId').textContent     = c.id;
    document.getElementById('modalBadge').innerHTML    = badgeHTML(c.category);
    document.getElementById('modalOverlay').classList.add('active');
}

// ── Close Detail Modal ──
function closeModalBtn() {
    document.getElementById('modalOverlay').classList.remove('active');
}

function closeModal(e) {
    if (e.target === document.getElementById('modalOverlay')) closeModalBtn();
}

// Close on Escape key
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModalBtn(); });

// ── Init ──
renderCards();