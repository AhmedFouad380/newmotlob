// window.onload = function () {
//             const invoice = this.document.getElementById("invoice");
//             console.log(invoice);
//             console.log(window);
//             var opt = {
//                 margin: 0,
//                 filename: 'CV.pdf',
//                 image: { type: 'jpeg', quality: 0.98 },
//                 html2canvas: { scale: 3  },
//                 jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//             };
//             html2pdf().from(invoice).set(opt).save();
//
// }
window.onload = function () {

    domtoimage.toPng(document.getElementById('invoice'))
        .then(function (blob) {
            var pdf = new jsPDF('P', 'pt', [$('#invoice').width(), $('#invoice').height()]);

            pdf.addImage(blob, 'PNG', 10, 10, $('#invoice').width(), $('#invoice').height());
            pdf.addPage('A4');
            pdf.addImage(blob, 'PNG', 10, 10, $('#invoice').width(), $('#invoice').height());
            pdf.save("test.pdf");

            that.options.api.optionsChanged();
        });



            // var page1 = document.getElementById('invoice');
            // var page2 = document.getElementById('page2');
            //
            // var pdf = new jsPDF('P', 'pt', [$('#page1').width(), $('#page1').height()]);
            //
            // pdf.addImage(page1, 'PNG', 10, 10, $('#page1').width(), $('#page1').height());
            // pdf.addPage();
            // pdf.addText(page2);
            // pdf.save("test.pdf");
            //
            // that.options.api.optionsChanged();

}

