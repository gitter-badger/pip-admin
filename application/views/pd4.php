<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ru">
<head>
<title>Печать квитанции формы ПД-4: Оплата за товар</title>
<meta name="robots" content="noindex, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ru">
</head>
<body>
<style type="text/css" media="print">
  #toolbox {
    display: none;
  }
</style>
<div id="toolbox" style="width: 180mm;margin-left: auto;margin-right: auto;font-family: Arial, sans-serif;font-size: 9pt;border-bottom: dashed 1pt black;margin-bottom: 0;padding: 2mm 0 0 0;text-align: justify;">
  <p style="margin: 2pt 0 2pt 0">Ваш заказ успешно принят. Квитанция формы «№ ПД-4» свободно располагается на листе формата А4. </p>
  <p style="margin: 2pt 0 2pt 0">Никаких особых настроек для печати документа обычно не требуется.</p>
  <p style="font-size: 90%;margin: 2pt 0 2pt 0">Копия заявки отправлена вам на e-mail: <strong><?php echo $email; ?></strong></p>
  <input type="button" value="Напечатать" onclick="window.print();" style="font-family: Arial, sans-serif;font-size: 9pt;color: black;background-color: white;border: 1px solid #333;margin: 8pt 8pt 8pt 0;">
  <p style="text-align: center;font-size: 80%;margin: 2pt 0 2pt 0"><span>информационный блок от начала страницы до пунктирной линии на печать не выводится</span></p>
</div>
<div class="topmargin" style="height: 12mm;"></div>
<table class="ramka" cellspacing="0" style="width: 180mm;border-top: #000 1px dashed;  border-bottom: #000 1px dashed;  border-left: #000 1px dashed;  border-right: #000 1px dashed;  margin: 0 auto 12mm auto;  height: 145mm;">
<tr>
<td style="width: 50mm; height: 65mm; border-bottom: black 1.5px solid;">
  <table style="width: 50mm; height: 100%;" cellspacing="0">
    <tr>
      <td class="kassir" style="vertical-align: top; letter-spacing: 0.2em;font-weight: bold;  font-size: 10pt;  font-family: 'Times New Roman', serif;  padding: 7mm 0 7mm 0;  text-align: center;  };">Извещение</td>
    </tr>
    <tr>
      <td class="kassir" style="vertical-align: bottom; letter-spacing: 0.2em;font-weight: bold;  font-size: 10pt;  font-family: 'Times New Roman', serif;  padding: 7mm 0 7mm 0;  text-align: center;  };">Кассир</td>
    </tr>
  </table>
</td>
<td style="width: 130mm; height: 65mm; padding: 0mm 4mm 0mm 3mm; border-left: black 1.5px solid; border-bottom: black 1.5px solid;">
<table cellspacing="0" style="width: 123mm; height: 100%;">
<tr>
  <td>
    <table width="100%" cellspacing="0">
      <tr>
        <td class="stext" style="height: 5mm;font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;"></td>
        <td class="stext7" style="text-align: right; vertical-align: middle;font-size: 7.5pt;font-family: 'Times New Roman', serif;"><i>Форма ПД-4</i></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td style="vertical-align: bottom;">
    <table style="width: 100%;" cellspacing="0">
      <tr>
        <td class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo $settings['company_name']; ?></span></td>
        <td class="string nowr" style="width: 1mm; white-space: nowrap;font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo $settings['company_kpp']; ?></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td class="subscript nowr" style="white-space: nowrap; font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(наименование получателя платежа)</td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td width="30%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<10): ?>
              <td class="cell" style="width: 10%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_inn'][$i] ? $settings['company_inn'][$i] : '&nbsp;'; ?></td>
              <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
        <td width="10%" class="stext7" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;</td>
        <td width="60%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<20): ?>
                <td class="cell" style="width: 5%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_account_number'][$i] ? $settings['company_account_number'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(ИНН получателя платежа)</td>
        <td class="subscript" style="font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">&nbsp;</td>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(номер счета получателя платежа)</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td width="2%" class="stext" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">в</td>
        <td width="64%" class="string" style="white-space: nowrap;font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr"><?php echo $settings['company_bank_name']; ?></span></td>
        <td width="7%" class="stext" align="right" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">БИК&nbsp;</td>
        <td width="27%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<9): ?>
                <td class="cell" style="width: 11%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_bank_bik'][$i] ? $settings['company_bank_bik'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="subscript" style="font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">&nbsp;</td>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(наименование банка получателя платежа)</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext7 nowr" width="40%" style="white-space: nowrap;font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Номер кор./сч. банка получателя платежа</td>
        <td width="60%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<20): ?>
                <td class="cell" style="width: 5%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_corr_account'][$i] ? $settings['company_corr_account'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="string" width="55%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr"><?php echo $product['name']; ?></span></td>
        <td class="stext7" width="5%" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;</td>
        <td class="string" width="40%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr"></span></td>
      </tr>
      <tr>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(наименование платежа)</td>
        <td class="subscript" style="font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">&nbsp;</td>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(номер лицевого счета (код) плательщика)</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Ф.И.О&nbsp;плательщика&nbsp;</td>
        <td class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo $fio; ?></span></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Адрес&nbsp;плательщика&nbsp;</td>
        <td class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"></span></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Сумма&nbsp;платежа&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo $product['price']; ?></td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;руб.&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">00</td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">
          &nbsp;коп.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Сумма&nbsp;платы&nbsp;за&nbsp;услуги&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">&nbsp;</td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;руб.&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">&nbsp;</td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;коп.</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="5%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Итого&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo $product['price']; ?></td>
        <td class="stext" width="5%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;руб.&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">00</td>
        <td class="stext" width="5%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;коп.&nbsp;</td>
        <td class="stext" width="20%" align="right" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&laquo;&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo date("d"); ?></td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;&raquo;&nbsp;</td>
        <td class="string" width="20%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo date("m"); ?></td>
        <td class="stext" width="3%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;20&nbsp;</td>
        <td class="string" width="5%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo date("y"); ?></span></td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;г.</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td class="stext7" style="text-align: justify;font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">С условиями приема указанной в платежном документе суммы, в
    т.ч. с суммой взимаемой платы за&nbsp;услуги банка,&nbsp;ознакомлен&nbsp;и&nbsp;согласен.
  </td>
</tr>
<tr>
  <td style="padding-bottom: 0.5mm;">
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext7" width="50%" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;</td>
        <td class="stext7" width="1%" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;"><b>Подпись&nbsp;плательщика&nbsp;</b></td>
        <td class="string" width="40%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="width: 50mm; height: 80mm; vertical-align: bottom; letter-spacing: 0.2em;font-weight: bold;  font-size: 10pt;  font-family: 'Times New Roman', serif;  padding: 7mm 0 7mm 0;  text-align: center;  };" class="kassir">Квитанция<br><br>Кассир</td>
<td style="width: 130mm; height: 80mm; padding: 0mm 4mm 0mm 3mm; border-left: black 1.5px solid;">

<table cellspacing="0" style="width: 123mm; height: 100%;">
<tr>
  <td style="vertical-align: bottom;">
    <table style="width: 100%; height: 8mm;" cellspacing="0">
      <tr>
        <td class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo $settings['company_name']; ?></span></td>
        <td class="string nowr" style="white-space: nowrap; widthL 1mm;font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo $settings['company_kpp']; ?></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(наименование получателя платежа)</td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td width="30%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<10): ?>
                <td class="cell" style="width: 10%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_inn'][$i] ? $settings['company_inn'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
        <td width="10%" class="stext7" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;</td>
        <td width="60%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<20): ?>
                <td class="cell" style="width: 5%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_account_number'][$i] ? $settings['company_account_number'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(ИНН получателя платежа)</td>
        <td class="subscript" style="font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">&nbsp;</td>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(номер счета получателя платежа)</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td width="2%" class="stext" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">в</td>
        <td width="64%" class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo $settings['company_bank_name']; ?></span></td>
        <td width="7%" class="stext" align="right" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">БИК&nbsp;</td>
        <td width="27%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<9): ?>
                <td class="cell" style="width: 11%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_bank_bik'][$i] ? $settings['company_bank_bik'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="subscript" style="font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">&nbsp;</td>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(наименование банка получателя платежа)</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext7 nowr" width="40%" style="white-space: nowrap;font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Номер кор./сч. банка получателя платежа</td>
        <td width="60%" class="floor" style="vertical-align: bottom;padding-top: 0.5mm;">
          <table class="cells" cellspacing="0" style="border-right: #000 1px solid;  width: 100%;">
            <tr>
              <?php $i = 0; while($i<20): ?>
                <td class="cell" style="width: 5%;font-family: Arial, sans-serif;  border-left: #000 1px solid;  border-bottom: #000 1px solid;  border-top: #000 1px solid;  font-weight: bold;  font-size: 8pt;  line-height: 1.1;  height: 4mm;  vertical-align: bottom;  text-align: center;"><?php echo $settings['company_corr_account'][$i] ? $settings['company_corr_account'][$i] : '&nbsp;'; ?></td>
                <?php $i++; endwhile; ?>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="string" width="55%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo $product['name']; ?></span></td>
        <td class="stext7" width="5%" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;</td>
        <td class="string" width="40%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"></span></td>
      </tr>
      <tr>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(наименование платежа)</td>
        <td class="subscript" style="font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">&nbsp;</td>
        <td class="subscript nowr" style="white-space: nowrap;font-size: 6pt;  font-family: 'Times New Roman', serif;  line-height: 1;  vertical-align: top;  text-align: center;">(номер лицевого счета (код) плательщика)</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Ф.И.О&nbsp;плательщика&nbsp;</td>
        <td class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo $fio; ?></span></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Адрес&nbsp;плательщика&nbsp;</td>
        <td class="string" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"></span></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Сумма&nbsp;платежа&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo $product['price']; ?></td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;руб.&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">00</td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">
          &nbsp;коп.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Сумма&nbsp;платы&nbsp;за&nbsp;услуги&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">&nbsp;</td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;руб.&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">&nbsp;</td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;коп.</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext" width="5%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">Итого&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo $product['price']; ?></td>
        <td class="stext" width="5%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;руб.&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">00</td>
        <td class="stext" width="5%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;коп.&nbsp;</td>
        <td class="stext" width="20%" align="right" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&laquo;&nbsp;</td>
        <td class="string" width="8%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo date("d"); ?></td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;&raquo;&nbsp;</td>
        <td class="string" width="20%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><?php echo date("m"); ?></td>
        <td class="stext" width="3%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;20&nbsp;</td>
        <td class="string" width="5%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;"><span class="nowr" style="white-space: nowrap;"><?php echo date("y"); ?></span></td>
        <td class="stext" width="1%" style="font-size: 8.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;г.</td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td class="stext7" style="text-align: justify;font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">С условиями приема указанной в платежном документе суммы, в
    т.ч. с суммой взимаемой платы за&nbsp;услуги банка,&nbsp;ознакомлен&nbsp;и&nbsp;согласен.
  </td>
</tr>
<tr>
  <td style="padding-bottom: 0.5mm;">
    <table cellspacing="0" width="100%">
      <tr>
        <td class="stext7" width="50%" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;">&nbsp;</td>
        <td class="stext7" width="1%" style="font-size: 7.5pt;font-family: 'Times New Roman', serif;vertical-align: bottom;"><b>Подпись&nbsp;плательщика&nbsp;</b></td>
        <td class="string" width="40%" style="font-weight: bold;  font-size: 8pt;  font-family: Arial, sans-serif;  border-bottom: #000 1px solid;  text-align: center;  vertical-align: bottom;">&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>
</table>
</td>
</tr>
</table>


</body>

</html>
