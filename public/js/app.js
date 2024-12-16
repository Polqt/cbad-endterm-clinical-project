document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');
    const forms = document.querySelectorAll('.needs-validation');
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('patientsTable');
    const rows = table.querySelectorAll('tbody tr');

    // Existing modal and form validation code remains the same...

    // Enhanced search functionality
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase().trim();
        let foundResults = false;

        rows.forEach(row => {
            // Create an array of cell texts to search through
            const cellTexts = Array.from(row.getElementsByTagName('td'))
                .map(cell => cell.textContent.toLowerCase())
                .join(' ');

            // Check if the search term is a whole word or exact match
            const shouldShow = cellTexts.split(/\s+/).some(word =>
                word === searchTerm ||
                word.includes(searchTerm)
            );

            row.style.display = shouldShow ? '' : 'none';

            if (shouldShow) {
                foundResults = true;
            }
        });

        // Optional: Add a "No results found" message
        const noResultsRow = table.querySelector('.no-results-row');
        if (!foundResults && searchTerm) {
            if (!noResultsRow) {
                const noResultsRow = document.createElement('tr');
                noResultsRow.classList.add('no-results-row');
                noResultsRow.innerHTML = `
                    <td colspan="8" class="text-center py-4">
                        <div class="alert alert-warning m-0">
                            <i class="fas fa-search me-2"></i>
                            No records found for "${this.value}"
                        </div>
                    </td>
                `;
                table.querySelector('tbody').appendChild(noResultsRow);
            }
        } else if (noResultsRow) {
            noResultsRow.remove();
        }
    });
});