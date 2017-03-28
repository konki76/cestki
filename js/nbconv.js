var element = document.getElementById('clickme');
element.addEventListener('click', function() {
 function conversion(number) 
   {
       if (isNaN(number) || number < 0 || 99999 < number) 
         {
           return 'Veuillez entrer un nombre entier compris entre 0 et 99999.';
         }

       var u1 = ['', 'いち', 'に', 'さん', 'よん', 'ご', 'ろく', 'なな', 'はち', 'きゅう', 'じゅう']
       var u2 = ['', '一', '二', '三', '四', '五', '六', '七', '八', '九', '十']
       var u3 = ['', 'ichi', 'ni', 'san', 'yon', 'go', 'roku', 'nana', 'hachi', 'kyuu', 'juu']

       var units = number % 10,
           tens = (number % 100 - units) / 10,
           hundreds = (number % 1000 - number % 100) / 100,
           sen = (number % 10000 - number % 1000) / 1000,
           man = (number % 100000 - number % 10000) / 10000;

       var tromaji, hromaji, senromaji, manromaji;
       var thiragana, hhiragana, senhiragana, manhiragana; 
       var tkanji, hkanji, senkanji, mankanji;

       if (number === 0) 
         {
           return '0\nromaji : rei / zero\nhiragana (/ katakana): れい / ゼロ\nkanji : 零';
         }

       else 
         {
           //conversion en romaji (dixaine, puis centaine, puis 1000 et enfin 10.000)
           tromaji = (tens > 1 ? u3[tens] +'juu' : '') + (tens == 1 ? 'juu' : '');
           hromaji = (hundreds > 1 && hundreds != 3　&& hundreds != 6 && hundreds != 8 ? u3[hundreds] + 'hyaku' : '') + (hundreds == 1 ? 'hyaku' : '') + (hundreds == 3 ? 'sanbyaku' : '') + (hundreds == 6 ? 'roppyaku' : '') + (hundreds == 8 ? 'happyaku' : '');
           senromaji = (sen > 1 ? u3[sen] + 'sen' : '') + (sen == 1 ? 'sen' : '');
           manromaji = (man > 0 ? u3[man] + 'man' : '');

           //conversion en hiragana (dixaine, puis centaine, puis 1000 et enfin 10.000)
           thiragana = (tens > 1 ? u1[tens] +'じゅう' : '') + (tens == 1 ? 'じゅう' : '');
           hhiragana = (hundreds > 1 && hundreds != 3　&& hundreds != 6 && hundreds != 8 ? u1[hundreds] + 'ひゃく' : '') + (hundreds == 1 ? 'ひゃく' : '') + (hundreds == 3 ? 'さんびゃく' : '') + (hundreds == 6 ? 'ろっぴゃく' : '') + (hundreds == 8 ? 'はっぴゃく' : '');
           senhiragana = (sen > 1 ? u1[sen] + 'せん' : '') + (sen == 1 ? 'せん' : '');
           manhiragana = (man > 0 ? u1[man] + 'まん' : '');

           //conversion en kanji (dixaine, puis centaine, puis 1000 et enfin 10.000)
           tkanji = (tens > 1 ? u2[tens] +'十' : '') + (tens == 1 ? '十' : '');
           hkanji = (hundreds > 1 ? u2[hundreds] + '百' : '') + (hundreds == 1 ? '百' : '');
           senkanji = (sen > 1 ? u2[sen] + '千' : '') + (sen == 1 ? '千' : '');
           mankanji = (man > 0 ? u2[man] + '万' : '');

           return 'votre nombre : ' + number 
                  + '\nromaji : ' + manromaji + ' ' + senromaji + ' ' + hromaji + ' ' + tromaji + ' ' + u3[units] 
                  + '\nhiragana : ' + manhiragana + senhiragana + hhiragana + thiragana + u1[units] 
                  + '\nkanji : ' + mankanji + senkanji + hkanji + tkanji + u2[units];
         }
 }

 var userEntry;
 while (userEntry = prompt('Indiquez le nombre à convertir sans espace (entre 0 et 99999) :')) 
   {
     alert(conversion(parseInt(userEntry, 10)));
   }
}, false);
