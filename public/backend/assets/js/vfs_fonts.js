pdfMake.fonts = {
    yourFontName: {
      normal: 'https://example.com/fonts/fontFile.ttf',
      bold: 'https://example.com/fonts/fontFile2.ttf',
      italics: 'https://example.com/fonts/fontFile3.ttf',
      bolditalics: 'https://example.com/fonts/fontFile4.ttf'
    },
  
    // download default Roboto font from cdnjs.com
    Roboto: {
      normal: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Regular.ttf',
      bold: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Medium.ttf',
      italics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Italic.ttf',
      bolditalics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-MediumItalic.ttf'
    },
 
    // example of usage fonts in collection
    PingFangSC: {
      normal: ['https://example.com/fonts/pingfang.ttc', 'PingFangSC-Regular'],
      bold: ['https://example.com/fonts/pingfang.ttc', 'PingFangSC-Semibold'],
    }
 }

 var docDefinition = {
    defaultStyle: {
      font: 'Roboto'
    }
}

pdfMake.createPdf(docDefinition, null, fonts)