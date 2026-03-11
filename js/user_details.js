// =====================================
//  VisionCycle – User Details Modal JS
// =====================================

let historyPage = 1;
const HISTORY_PER_PAGE = 5;
let currentHistory = [];

// ── Category color class ──
function catClass(cat) {
    if (cat === 'Recyclable')     return 'cat-recyclable';
    if (cat === 'Non-Recyclable') return 'cat-non-recyclable';
    if (cat === 'Compostable')    return 'cat-compostable';
    return '';
}

// ── Open User Modal ──
function openModal(userId) {
    const u = users.find(x => x.id === userId);
    if (!u) return;
    document.getElementById('mUserId').textContent   = u.id;
    document.getElementById('mName').textContent     = u.name;
    document.getElementById('mUsername').textContent = u.username;
    document.getElementById('mEmail').textContent    = u.email;
    document.getElementById('mScans').textContent    = u.scans;

    currentHistory = getHistory(userId);
    historyPage = 1;
    renderHistoryTable();
    document.getElementById('modalOverlay').classList.add('active');
}

// ── Render History Table ──
function renderHistoryTable() {
    const total = Math.ceil(currentHistory.length / HISTORY_PER_PAGE);
    const start = (historyPage - 1) * HISTORY_PER_PAGE;
    const page  = currentHistory.slice(start, start + HISTORY_PER_PAGE);
    const end   = Math.min(start + HISTORY_PER_PAGE, currentHistory.length);

    document.getElementById('showingEntries').textContent =
        `Showing ${start + 1} to ${end} of ${currentHistory.length} entries`;

    document.getElementById('historyTableBody').innerHTML = page.map(h => `
        <tr>
            <td>${h.classId}</td>
            <td>${h.item}</td>
            <td class="${catClass(h.category)}">${h.category}</td>
            <td>${h.date}</td>
        </tr>
    `).join('');

    renderModalPagination(total);
}

// ── Render Modal Pagination ──
function renderModalPagination(total) {
    if (total <= 1) { document.getElementById('modalPagination').innerHTML = ''; return; }

    let html = '';

    html += `<button class="mpg-btn ${historyPage===1?'disabled':''}" onclick="mGoPage(1)">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="11 17 6 12 11 7"/><polyline points="18 17 13 12 18 7"/></svg>
    </button>`;
    html += `<button class="mpg-btn ${historyPage===1?'disabled':''}" onclick="mGoPage(${historyPage-1})">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
    </button>`;

    const pages = getPageNums(historyPage, total);
    pages.forEach(p => {
        if (p === '...') html += `<span class="mpg-gap">...</span>`;
        else html += `<button class="mpg-btn ${p===historyPage?'active':''}" onclick="mGoPage(${p})">${p}</button>`;
    });

    html += `<button class="mpg-btn ${historyPage===total?'disabled':''}" onclick="mGoPage(${historyPage+1})">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    </button>`;
    html += `<button class="mpg-btn ${historyPage===total?'disabled':''}" onclick="mGoPage(${total})">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="13 17 18 12 13 7"/><polyline points="6 17 11 12 6 7"/></svg>
    </button>`;

    document.getElementById('modalPagination').innerHTML = html;
}

// ── Page Numbers Logic ──
function getPageNums(cur, total) {
    if (total <= 6) return Array.from({length: total}, (_, i) => i + 1);
    if (cur <= 2)   return [1, 2, 3, '...', total];
    if (cur >= total - 1) return [1, '...', total - 2, total - 1, total];
    return [1, '...', cur, '...', total];
}

// ── Go to Page ──
function mGoPage(p) {
    const total = Math.ceil(currentHistory.length / HISTORY_PER_PAGE);
    if (p < 1 || p > total) return;
    historyPage = p;
    renderHistoryTable();
}

// ── Close Modal ──
function closeModalBtn() {
    document.getElementById('modalOverlay').classList.remove('active');
}
function closeModal(e) {
    if (e.target === document.getElementById('modalOverlay')) closeModalBtn();
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModalBtn(); });