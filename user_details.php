<!-- User Details Modal -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModalBtn()">&#x2715;</button>
        <div class="modal-title">User Details</div>

        <!-- User Info -->
        <div class="user-info-grid">
            <div class="user-info-row">User ID: <span id="mUserId"></span></div>
            <div class="user-info-row">Email: <span id="mEmail"></span></div>
            <div class="user-info-row">Name: <span id="mName"></span></div>
            <div class="user-info-row">Total Scans: <span id="mScans"></span></div>
            <div class="user-info-row">Username: <span id="mUsername"></span></div>
        </div>

        <!-- Classification History -->
        <div class="section-title">Classification History</div>
        <div class="history-table-wrap">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Classification ID</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="historyTableBody"></tbody>
            </table>
        </div>

        <!-- Footer: showing + pagination -->
        <div class="modal-footer">
            <div class="showing-entries" id="showingEntries"></div>
            <div class="modal-pagination" id="modalPagination"></div>
        </div>
    </div>
</div>