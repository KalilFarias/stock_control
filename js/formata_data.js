function formatDate(inputDate) {
    const regex = /^\d{4}-\d{2}-\d{2}$/;
    if (!regex.test(inputDate)) {
        throw new Error('Data inválida. O formato deve ser YYYY-MM-DD.');
    }
    
    const parts = inputDate.split('-');
    const year = parts[0];
    const month = parts[1];
    const day = parts[2];

    return `${day}/${month}/${year}`;
}

// Função para formatar as datas na tabela
function formatTableDates() {
    const dateCells = [
        ...document.querySelectorAll('#stock-table tbody td:nth-child(4)'),
        ...document.querySelectorAll('#stock-table tbody td:nth-child(6)')
    ];

    dateCells.forEach(cell => {
        const originalDate = cell.textContent;
        const formattedDate = formatDate(originalDate);
        cell.textContent = formattedDate;
    });
}

// Chama a função quando o DOM estiver completamente carregado
document.addEventListener('DOMContentLoaded', formatTableDates);
