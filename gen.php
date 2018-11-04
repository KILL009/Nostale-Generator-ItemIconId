<?php
$handle = fopen("itemlist.txt", "r");
	$i = 0;
	$pos = 0;
	$main = 0;
	$output = [];
	
if ($handle) {
	$i = 0;
	$pos = 0; //nr pola dla itemu
	$main = 1; //nr itemu 
	$output = [];

    while (($line = fgets($handle)) !== false) {
		if (strpos($line, '  <tr>') !== false) {$pos = 0;}
		elseif (strpos($line, '  </tr>') !== false) {$pos = 0; $main++; $output[$main] = $save;}
		else {$save[$pos] = $line;}
				
		$pos++;
		$i++;
    }

    fclose($handle);
} else {
	die('blad jakis');
    // error opening the file.
}



$buildinid = 0;

echo '[0';
for ($i = 0; $i <= count($output); $i++) {
	$buildinid++;
	$id = intval(filter_var ( $output[$i+3][1], FILTER_SANITIZE_STRING));
	$iconid = intval(filter_var ( $output[$i+3][9], FILTER_SANITIZE_STRING));
	
	if ($buildinid === $id){
		echo ','.$iconid.'';
		if ($i % 30 == 0){
			echo '<br>';
		}		
	}else{
		$i--;
		echo ',0';
	}
	if ($buildinid == 10066){break;}

}
echo ']';


$itemiconidarray = [0,1
,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31
,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61
,62,63,64,65,20,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91
,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121
,122,123,124,125,126,127,128,129,130,131,132,189,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151
,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181
,182,183,184,302,821,820,820,820,821,821,192,193,193,193,196,196,196,350,200,203,201,202,204,205,206,207,208,209,210,211
,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241
,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271
,272,804,274,275,276,277,274,275,276,277,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301
,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331
,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,1211,348,349,350,351,352,353,354,355,356,357,358,359,360,361
,362,363,364,365,366,367,368,369,370,371,372,373,374,375,705,706,704,719,316,315,317,318,713,715,714,712,320,319,321,322
,392,393,394,395,396,397,398,399,400,401,402,403,404,405,406,407,408,409,410,411,412,413,414,415,416,417,418,419,420,421
,422,423,424,425,426,427,428,429,397,399,361,362,363,371,372,373,366,367,368,441,442,428,444,445,446,447,448,449,450,451
,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,478,479,480,481
,482,483,457,457,478,478,479,479,480,480,481,481,482,482,483,483,498,499,500,501,502,503,504,505,506,507,508,509,510,511
,512,513,514,515,516,517,518,519,520,521,522,523,524,525,526,527,528,529,530,531,532,533,534,535,536,537,538,539,540,541
,542,543,544,545,546,547,547,547,550,550,550,553,553,553,556,556,556,559,559,559,562,562,562,565,565,565,568,568,568,571
,571,571,574,574,574,577,577,577,580,580,580,583,583,583,586,586,586,589,589,589,589,589,589,589,589,589,589,599,450,451
,452,453,458,459,460,461,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,450,451,452,453,458,459,460,461
,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,446,454,455,456,446,454,455,456,599,599,599,599,599,599
,599,599,599,665,665,665,668,668,668,671,671,671,674,674,674,677,677,677,680,680,680,683,683,683,686,686,686,689,689,689
,692,692,692,695,695,695,698,698,700,701,702,703,704,705,706,707,708,709,710,711,712,713,714,715,716,717,718,719,720,721
,722,723,724,725,698,727,727,727,730,730,730,733,733,733,736,736,736,739,739,739,742,742,742,745,745,745,748,748,748,751
,751,751,263,299,266,300,269,301,77,292,85,290,93,294,106,298,119,296,132,272,725,414,720,412,303,416,535,307,313,305
,782,782,782,785,785,785,788,788,788,791,791,791,794,794,794,797,797,797,800,801,802,803,805,805,805,807,807,807,810,810
,810,813,813,813,816,816,816,819,819,819,822,822,822,825,825,825,828,828,828,831,831,831,834,834,834,837,837,837,840,840
,840,843,843,843,846,846,846,849,849,849,852,852,852,855,855,855,858,858,858,861,861,861,864,864,864,867,867,867,870,870
,870,873,873,873,876,876,876,879,879,879,302,1168,800,801,802,803,888,889,889,889,892,892,892,895,895,895,898,898,900,901
,902,903,904,905,906,907,908,909,910,911,912,913,914,898,895,898,889,892,920,315,316,317,318,925,925,925,934,929,930,934
,934,933,933,933,936,936,936,939,354,357,302,943,350,354,357,292,290,294,950,951,951,951,951,955,955,955,955,959,959,959
,959,963,963,963,963,660,588,969,969,971,971,973,973,973,976,976,976,444,921,981,981,981,981,4000,4000,4000,4000,281,990,991
,992,280,279,995,996,997,259,302,1000,1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,1020,1021
,1022,1023,1024,1025,1026,1027,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051
,1052,1053,1054,1055,1056,1057,1058,1059,1044,1044,1044,1044,1044,1044,1044,1044,1044,1044,1044,1044,1072,1073,2138,1053,1011,1077,1078,1079,1080,1081
,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1093,1097,1098,1099,1100,1101,1102,1103,1102,1102,1106,1107,1108,1109,1110,1111
,1112,1113,2144,1115,1116,1117,1118,1119,1120,1102,1122,1123,1124,1125,1126,1127,1128,1129,1130,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141
,1142,1143,1144,1145,1146,1146,1146,1149,1150,1151,1152,1153,1154,1155,1156,1157,1158,1159,1160,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171
,1172,1173,1174,1175,1176,1177,1178,1179,1180,1181,1135,1136,1102,1102,1102,1149,1188,1189,1190,1191,1192,1193,1194,1195,1196,1370,1198,1199,1200,1201
,1202,1203,1204,1205,1206,1207,1208,1209,1210,347,1212,1213,1214,1215,1216,1217,1218,1219,1220,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231
,1232,1233,1234,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1247,1248,1249,1250,1251,1252,1253,1254,1255,1256,1257,1258,1259,1260,1261
,1262,1263,1264,1265,1266,1267,1268,1269,1270,1271,1272,1272,1272,1275,1275,1275,1278,1278,1278,1281,1281,1281,1284,10120,10119,1287,1288,1289,1290,1291
,1292,1293,1294,1295,1296,1297,1189,1299,1300,1301,1302,1160,1205,1215,327,1154,1308,1168,1216,1311,1312,1313,1314,1315,1316,1095,1095,1095,1095,1209
,1241,1178,1324,1202,1315,1102,1102,1102,1102,1221,1332,1333,1334,1335,1336,1337,1338,1339,1340,1341,1342,1343,1344,1345,1346,1347,1348,1349,1350,1351
,1352,1353,1354,1355,1356,1102,1102,1102,1102,2937,1362,1363,1364,1365,1366,1367,1368,1369,1370,1371,1372,1370,1374,1375,1376,1377,1378,1379,1498,1381
,1382,1383,1384,1427,1386,1387,1388,1389,1390,1391,1392,1393,1394,1395,1396,1397,1398,1399,1400,1401,1402,1403,1404,1405,1406,1407,1408,1409,1410,1253
,1168,1399,1399,1399,1399,1399,1399,1400,1401,1402,1403,1404,1405,1399,1399,1366,1428,1429,1430,1400,1401,1402,1403,1404,1405,1437,1370,1399,1399,1399
,1399,1399,1399,1399,1446,1447,1448,1449,1450,1450,10119,1401,1402,1455,1456,1457,1458,1459,1460,1400,1401,1402,1403,1404,1405,1370,1370,1370,1370,1370
,1370,1370,1370,1370,1370,1370,1370,1399,1370,1370,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1399,1011,10120,1400,1401
,1402,1403,1404,1405,1399,1370,1403,1402,1402,1399,1399,1399,1399,1399,1399,1405,1405,1405,1405,1405,1405,1405,1405,1405,1405,1405,1405,1405,1405,1405
,1405,1400,1401,1402,1403,1404,1405,1539,1540,1541,1542,1542,1544,1544,1546,1546,1548,1548,1834,1834,1835,1835,1836,1836,1837,1837,1838,1838,1839,1839
,1399,1399,1399,1401,1401,1401,1401,1399,1400,1401,1402,1403,1404,1405,1145,1402,1401,1399,1580,1581,1582,1399,1168,1585,1399,1370,1370,1370,1370,1370
,1370,1370,1594,1595,1596,1597,1598,1599,1600,1601,1402,1401,1289,1400,1401,1402,1403,1404,1405,1611,1612,1613,1614,1615,1616,1617,1618,1619,1620,1621
,336,1399,1624,1625,1626,1627,1621,336,1630,1631,1632,1633,1634,1635,1636,1637,1374,1621,1289,1290,1405,1402,1399,1405,1402,1399,1405,1402,1399,1405
,1402,1399,1405,1402,1399,1405,1402,1399,1405,1402,1399,1663,1400,1401,1402,1403,1404,1405,1670,1670,1672,1672,1674,1674,1676,1676,1678,1678,1680,1680
,1374,1507,1507,1685,1686,1507,1688,1400,1401,1402,1403,1404,1405,1695,1696,1697,1698,1699,1700,1701,1702,1703,1704,1705,1706,1707,1708,1709,1710,1711
,1712,1713,1399,1399,1405,1402,1399,1399,1399,1146,1400,1401,1402,1403,1404,1405,1728,1729,1730,1731,1731,1731,1731,1731,1731,1730,1743,1739,1740,1740
,1742,1742,1742,1742,1742,1742,1742,1742,1750,1751,1742,1742,1742,1742,1742,1742,1758,1759,1760,1731,1740,1731,1731,1765,1766,1767,1768,1740,1740,1771
,1772,1773,1744,1507,1507,1450,1778,1778,1778,1778,1782,1731,1731,1785,1731,1787,1787,1787,1790,1791,1791,1791,1791,1791,1796,1450,1798,1799,1800,1800
,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1819,1800,1110,1800,1800,1800,1800,1800,1800,1800,1800,1800,1831
,1832,1800,1800,1800,1800,1800,1800,1800,1800,1800,1800,1843,1782,1782,1846,1222,1848,1849,1850,1850,1850,1850,1448,1765,1765,1449,1272,1272,1731,1731
,1731,1731,1731,1731,1866,1866,1866,1866,1866,1871,1872,1873,1874,1875,1876,1877,1878,1879,1880,1881,880,880,880,880,1275,1241,1888,1889,1890,1891
,1892,880,1822,1823,1824,1825,1826,1827,1828,1829,1830,1840,1841,1405,1906,1907,1402,1399,1546,1676,1837,1913,1914,1913,1915,1916,1917,1539,1541,1507
,1275,1278,1278,1541,336,336,1541,1541,1541,1541,1841,1399,1399,1507,1507,1507,1507,1507,1507,1507,1507,1507,1507,1945,1945,1947,1947,1253,1402,1401
,1621,1370,1168,1699,1374,1168,1699,1542,1676,1370,1370,1370,1370,1965,336,1370,1370,1370,1970,1971,1826,1840,394,1370,1507,1370,1405,1405,1400,1981
,1982,1983,1984,1985,1985,1987,1987,1370,1370,1370,1370,1370,1370,1400,1411,1411,1411,1411,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011
,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021,2022,2023,2024,2025,2026,2027,2028,2029,2030,2031,2032,2033,2034,2035,2036,2037,2038,2039,2040,2041
,2042,2043,2044,2045,2046,2047,2048,2049,2050,2051,2052,2053,2054,2055,2056,2057,2058,2059,2119,2119,2119,2119,2119,2119,2119,2119,2119,2119,2070,2071
,2072,2073,2074,2075,2076,2077,2078,2079,2080,2081,2082,2083,2084,2085,2086,2087,2088,2089,2090,2091,2092,2093,2094,2095,2096,2097,2098,2099,2100,2101
,2102,2103,2104,2105,2106,2107,2108,2109,2110,2111,2112,2113,2114,2115,2116,2117,2118,2119,2120,2121,2122,2123,2124,2125,2126,2127,2128,2129,2119,2131
,2132,2133,2134,2135,2136,2137,2138,2139,2140,2141,2142,2143,2144,2145,2146,2147,2148,2149,2150,2151,2152,2153,2154,2155,1064,2157,2158,2159,2160,2161
,2162,2163,2164,2165,2166,2167,2168,2169,2170,2171,2172,2173,2174,2175,2176,2177,2178,2179,2180,2181,2182,1197,1107,1108,1109,2187,2188,1202,2106,2181
,2192,1832,2194,1180,2196,1220,2198,1179,2200,2201,2202,1209,2204,1225,2206,1099,2208,1194,1193,1191,1192,2213,2214,2215,2216,2217,2218,2219,2220,2221
,2222,2223,2224,2225,2226,2227,2228,2229,2230,2231,2232,2233,2234,2235,2236,2237,2238,2239,2240,2241,2242,2243,2222,2224,2234,2242,201,1031,1032,1033
,1101,1145,1151,1172,1177,1200,1209,1213,1223,1229,1231,1254,1258,1259,1263,1264,1267,1295,2022,2073,2075,2076,2093,2105,2172,2177,2180,2180,2280,2281
,2282,2283,2284,2285,2286,2175,2288,2289,2290,2291,2292,2293,2294,2295,2296,1064,2298,1801,1802,1803,1804,2303,2304,2305,2306,2307,2308,2309,2310,2311
,2160,2159,2281,2373,1134,1134,1134,1134,1523,2332,768,2332,769,1445,1534,2286,1535,1453,2644,2645,2646,2647,0,0,2286,2176,2096,2339,0,2341,2342,2343,2344
,2345,2346,2347,2348,2349,2350,2351,2047,2043,2039,2208,2208,2239,2236,1194,1192,0,0,0,0,0,0,2367,2368,2369,2370,2371,2372,2373,2374,2375,2376,2377,2378,2379,2380
,2381,2382,2383,2384,1738,1774,1774,1774,1774,1765,1765,1765,1765,2035,2352,2353,2354,0,1520,1888,1519,0,0,2346,2405,0,0,0,0,0,0,0,0,0,0,0,0,2399,2561,2014,2580,2618,2670,1251,2715
,2712,2834,2925,2836,0,2838,0,1154,2840,2841,2842,2843,2844,2845,2846,2847,2848,2849,2850,2852,2853,2854,2855,2856,2857,2858,2859,2860,2875,2876,2877,2155
,2104,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2443,2444,2445,2446,2447,2448,2449,1787,1768,1785,1791,2550,2549,2548,2601,2603,2602,2604,2597,2599,2598,2600,2605,2606,2677,2965,2966,2967,2981
,2981,2981,2981,2982,2987,2983,2984,2985,2986,0,2992,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2907,2335,2340,2916,2908,2917,2909,2910,2911,2913,2912,2914,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2865,2865,2886,2611,2612,1522,2757,2756
,2755,2733,2752,2734,2738,2737,2740,2753,2851,2741,2743,2748,2749,2754,2758,2797,2797,2797,2797,2798,2798,2798,2798,2799,2799,2799,2799,2799,2799,2799
,2799,2799,2799,0,2799,2799,2799,2799,2799,2799,2799,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2454,2455,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3000,3001,3002,3003,3104,3005,3006,3007,3008,3009,3010,3011,3012,3013,3014,3015,3016
,3017,3018,3019,3020,3021,3022,3023,3024,3025,3026,3027,3028,3029,3030,3031,3032,3033,3034,3035,3036,3037,3038,3039,3040,3041,3042,3043,3044,3045,3046
,3047,3048,3049,3050,3051,3052,3053,3054,3055,3056,3057,3058,3059,3060,3061,3062,3063,3064,3065,3066,3067,3068,3069,3070,3071,3072,3073,3074,3075,3076
,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099,3100,3101,3102,3103,3104,1500,1500
,3107,3108,3109,3110,3111,3112,3113,3114,3115,3112,3117,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127,3128,3129,3130,3131,3000,3001,3002,3135,3003
,3005,3006,3007,3008,3009,3010,3011,3012,3013,3014,3015,3016,3017,3018,3020,3021,3022,3023,3024,3025,3026,3027,3028,3029,3030,3031,3032,3033,3034,3035
,3036,3037,3038,3039,3040,3041,3042,3043,3044,3045,3046,3047,3048,3049,3050,3051,3052,3053,3054,3055,3056,3057,3059,3063,3064,3069,3070,3071,3072,3073
,3074,3075,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099,3100,3101,3102,3103,3108,3109
,3110,3111,3112,3113,3114,3112,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3000,3000,3000,3000,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,349,4001,353,4003,356,4005,291,352,289,351,293,355,298,360,409,296,359,410,272,358
,411,894,893,893,917,917,894,917,894,366,362,361,362,361,363,225,716,61,705,703,707,710,711,65,721,722,656,657,658,659
,660,661,662,663,664,588,578,579,581,582,584,776,777,784,1414,1415,950,1513,1512,1513,1512,1513,1512,1513,1512,976,973,1513,1512,348
,1418,1406,1409,302,4084,1419,1420,1421,1422,1423,1424,1425,969,969,969,971,971,971,192,915,915,1524,1438,1525,1526,1527,798,764,760,752
,754,758,762,756,765,761,753,755,759,763,757,767,767,767,767,814,1506,1528,1528,987,988,989,993,2532,2533,2535,2535,2535,2535,2536
,2536,2536,2536,2537,2537,2537,2537,2538,2538,2538,2538,2532,1989,1990,1991,1992,1993,1994,1995,1996,1997,2557,2557,2557,2557,2559,2558,2560,2564,2565
,2565,2565,2565,2566,2567,2568,2569,2569,2570,2570,2609,2609,2607,2607,2610,2610,2608,2608,2616,1524,1525,1526,1527,2558,2562,2652,2653,2572,2572,2581
,2596,2614,2614,2614,2614,2615,2615,2615,2615,1414,1414,1414,1415,1415,1415,2616,2632,2633,2634,2632,2633,2634,2635,2636,2637,2635,2636,2637,2638,2639
,2640,2638,2639,2640,2641,2642,2643,2641,2642,2643,2661,2684,2684,2684,2684,2686,2686,2686,2686,2683,2683,2683,2683,2685,2685,2685,2685,2802,2802,2801
,2801,2804,2805,2807,2808,2884,2884,2885,2885,2883,2887,2887,2888,2888,2889,2889,2892,2892,2893,2893,2894,2894,2890,2890,2891,2891,2895,2895,2896,2896
,656,657,658,659,660,661,662,663,664,588,2900,2900,2901,2901,2902,2903,2915,2904,2901,2918,2919,2920,2918,2919,2920,2926,2933,2933,2935,2935
,2934,2934,2936,2936,4058,4059,2943,2938,2939,2940,2941,2945,2947,2946,2948,2949,2950,2951,2952,2953,2957,2957,2957,2962,2958,2963,4042,4043,4050,4060
,2959,2960,2961,2959,2960,2961,2973,2974,2975,2976,2977,2978,2979,2980,2993,2993,2994,2994,2995,2996,2997,2995,2996,2997,4006,4006,4007,4007,429,4008
,4008,4010,4010,4011,4011,4046,4046,4047,4047,4044,4044,4045,4045,4056,4056,4057,4057,4088,4089,4075,4076,4075,4076,4077,4077,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4048,2708,2707,2706,2657
,2656,2655,2654,2588,2589,2590,2588,2589,2590,2544,2545,2546,2551,2582,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2701,2648,2649,2660,2673,2687,2879,2879,2879,2879,2880,2880,2880,2880,2881,2881
,2881,2881,302,302,4014,4012,4013,4016,4012,4013,4015,4017,4017,4018,4019,4020,4021,4022,4023,4024,4025,4026,4029,4031,4031,4032,4031,4032,4033,4032
,4032,4033,4034,4035,4036,4037,4038,4039,4040,4041,4049,4014,4029,4061,4062,4063,4064,4065,4066,4067,4068,4069,4070,4071,4072,4073,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2573,2579,2574,2575
,2623,2624,2625,2672,2681,2682,2694,2695,2697,2709,2710,2711,849,2726,2729,2732,2790,2789,2803,2806,2809,2810,2811,2811,2812,2812,0,0,0,0,0,2829,2828,2827,2770
,2826,2825,2822,2823,2824,707,722,225,985,416,419,422,298,296,272,360,358,359,290,268,294,262,292,265,402,408,405,349,356,353
,2428,0,2430,2431,2432,2433,2434,2435,2436,2437,2438,2439,2440,2418,2419,2421,2422,2424,2425,2464,2406,2466,2407,2468,2408,2409,2410,2412,2413,2415,2416
,2464,2406,2465,2466,2407,2467,2468,2408,2469,2409,2410,2411,2412,2413,2414,2415,2416,2417,2418,2419,2420,2421,2422,2423,2424,2425,2426,2427,2428,2429
,2430,2431,2432,2433,2434,2435,2436,2437,2438,2439,2440,2781,2786,2787,2788,2782,2783,2784,2785,2774,2775,2776,2777,2778,2779,2762,2763,2764,2759,2760
,2761,2780,2765,2766,2767,2768,2769,2770,2771,2772,2773,2793,2795,2794,2796,2791,2792,2800,2815,2818,2814,2813,2817,2816,2819,2821,2820,4049,2930,0,578
,579,581,582,584,0,0,0,0,0,0,1405,1411,1400,1744,1744,1744,1744,1413,336,1368,1134,1380,1385,1743,1743,1743,1743,1744,1370,1370,1370,1370,1370,1370,1370,1370
,1370,1370,1370,1370,1370,1370,1370,1400,1209,1200,2142,2106,1730,1621,1507,1507,1507,1370,1370,1370,1370,1370,1370,1405,1405,1542,1541,1541,1541,1541
,1541,1541,1541,1508,1509,1509,1370,1511,1507,1510,1772,1699,1743,1744,1399,1399,1370,1370,1370,1374,1743,1744,1399,1370,1399,1399,1743,1518,2096,1374
,1687,1399,1400,1399,2954,1973,1510,1507,1370,1507,1743,1744,1743,1743,1744,1744,1399,1744,1643,1744,4085,4086,4087,1407,1743,1743,1743,1743,1366,1507
,1417,336,1426,1431,1743,1743,1743,1744,1743,1399,1399,1399,1399,1432,1743,1744,1507,1507,1507,1507,1743,1743,1507,1440,1439,1441,1442,1443,1880,1444
,1743,1744,1507,1743,1744,1433,336,1744,1507,2398,1507,1743,1744,1743,1744,1744,1507,1401,1621,1399,1743,1744,1744,1744,1743,1744,2463,1743,1374,1374
,1374,1374,1374,1374,1744,1744,1507,1507,1507,1507,1507,1507,1507,1507,1744,2281,766,1296,1362,770,336,1744,1744,1743,1744,1507,931,1743,1744,1743
,1529,1530,1536,1537,1538,1531,1507,1510,2002,2200,1532,1533,1744,1743,1744,1743,1744,1744,1744,1501,336,1502,336,1744,1743,1503,336,1504,336,1505
,336,1501,336,1502,336,1744,1743,1744,1744,1507,1743,1507,1744,1743,1507,1744,1743,1744,1744,1744,1744,2534,1099,1190,1743,2341,1743,1743,1743,1744
,1507,1507,1743,1743,1743,1744,1743,1744,1743,1744,1743,1744,1744,1507,1743,1400,1744,1743,1744,1743,1621,2532,1743,1744,1743,1744,1744,1744,1743,1743
,1744,1743,1744,1743,2571,1402,1401,1507,1743,1743,1743,1102,1744,1743,1744,1743,1402,1743,1744,1402,1744,1743,2591,336,2592,336,2593,336,1743,1743
,1744,1744,1744,2594,336,2595,1744,1743,1743,1744,1743,1289,1290,1291,1743,1546,1676,1542,1670,1401,1402,1403,1370,1744,1743,1743,1744,1743,1744,1401
,1743,1401,1402,2619,336,1744,1744,1743,1744,1743,1401,1744,2620,2621,1401,2622,1743,1401,1744,1743,1743,1743,1743,1401,1744,1743,1743,1743,1744,2626
,2627,2628,2629,2630,2631,336,336,336,336,336,336,1743,1744,1289,1290,1291,1743,1744,1743,1744,1743,1744,1744,1743,1744,1744,1744,1744,1743,1743
,1743,1370,1370,1370,1370,1134,1743,1744,1744,1744,1744,1744,1744,1744,2650,2651,1744,1744,1744,1744,1744,1744,1744,1744,1370,1744,1744,1744,1744,1744
,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744
,1744,1744,1744,1744,1744,1744,1744,1744,1744,1399,1399,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,2658,2659,2547,1102,2144,2552,2553,2554,2555
,2556,417,423,420,2563,2583,1102,2584,2585,2586,1731,2587,2617,1744,1744,1744,1744,2688,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744
,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,2727,2730,1744,1744,1744,1744,1744,1744,2731,1744,1744,1744,1744,1744,1744
,1744,1744,1744,1744,1744,1743,1744,1744,1744,1744,1744,1744,1744,1744,1743,1242,1243,1244,1744,1744,1744,1744,1744,1744,2882,1743,1744,1744,1744,1744
,1744,1405,1743,1744,1744,1744,1744,1743,1744,1744,1744,1744,2898,1743,1744,1744,1822,1823,1824,1825,1826,1827,1828,1829,1830,1840,1841,1744,1744,1744
,1744,1744,1744,1744,1744,1744,1744,1743,1744,1744,1744,1743,1743,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,2955,1744
,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1272,1275,1278,1115,1116,1744,1744,1743,1744,1743,1744,1743
,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,1744,4074,1744,1744,1744,1744,1744,1744,1744,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1744,4051,4052,4053,4054,4055,1744
,4009,2999,336,2991,2998,2989,2990,2968,2969,302,2970,2971,2972,2964,1699,1699,1850,2927,2928,2929,2923,2924,2922,2921,2905,2868,2833,2863,2864,2861
,2862,2865,2866,2867,2868,2869,2870,2871,2587,2873,2874,2899,2835,2837,2839,1743,2739,2742,2736,2751,2750,2746,2744,2745,2747,1743,1621,1399,2717,2725
,2723,2720,2724,2722,2719,2721,2718,2441,2442,2587,2188,2906,0,0,0,0,1850,2450,2451,1849,1778,2452,336,2456,2457,2458,2459,2460,2461,2462,2453,1150,2181,1159
,1199,1199,2456,1199,2578,2577,1363,2613,1244,1246,1247,1248,1249,1058,1402,1332,1336,1154,1460,1459,1966,1967,1968,1969,2931,929,1438,4084,445,2572
,2932,302,1060,302,302,2662,2663,2664,2665,2666,2667,2668,2669,2674,2675,2676,0,2678,2679,2680,2698,2696,2690,2691,2692,2693,2699,2704,2702,2703,2705
,2702,2702,2716,2713,2714,1744,1744,1744,1450,2944,336,2942,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,180,181,182,804,274,275,276,277,274,275,276,277,337,338,339,340,341,342
,343,344,345,346,348,361,362,363,366,367,368,371,372,373,397,398,399,425,426,427,428,429,441,442,444,446,447,450,451,452
,453,454,455,456,457,478,479,480,457,457,478,478,479,479,480,480,536,537,538,451,452,453,450,451,452,453,446,454,455,456
,446,454,455,456,888,929,930,943,950,969,971,973,973,973,976,976,976,921,981,981,981,981,4000,4000,4000,4000,656,657,658,659
,660,661,662,663,664,588,784,1513,1512,1513,1512,1513,1512,1513,1512,1418,4084,1419,1420,1421,1422,1423,1424,1425,764,760,752,754,758,762
,756,765,761,753,755,759,763,757,767,767,767,767,814,1506,987,988,989,993,2557,2557,2557,2557,2558,2560,2564,2565,2565,2565,2565,2569
,2569,2570,2570,2609,2609,2607,2607,2610,2610,2608,2608,2616,2652,2653,2581,2596,2614,2614,2614,2614,2615,2615,2615,2615,1414,1414,1414,1415,1415,1415
,2684,2684,2684,2684,2686,2686,2686,2686,2683,2683,2683,2683,2685,2685,2685,2685,2802,2802,2801,2801,2648,2649,2660,2673,2687,2573,2574,2575,2623,2624
,2625,2672,2681,2682,2694,2695,2697,2709,2710,2711,2726,2729,2732,2790,2789,2803,2806,2809,2810,2885,2885,2884,2884,2887,2887,2888,2888,2889,2889,2892
,2892,2893,2893,2894,2894,2891,2891,2890,2890,2895,2895,2896,2896,450,2900,2900,2901,2901,546,543,2812,2811,2902,2903,2915,2883,2918,2919,2920,2918
,2919,2920,2926,2933,2933,2935,2935,2934,2934,2936,2936,2943,2941,2950,2951,2952,2953,2957,2957,2957,2958,2962,2963,2973,2974,2975,2976,2977,2978,2979
,2980,2993,2993,2994,2994,2995,2996,2997,2995,2996,2997,4006,4006,4007,4007,4008,4008,429,4010,4010,4011,4011,4042,4043,4046,4046,4047,4047,4044,4044
,4045,4045,4050,4056,4056,4057,4057,4058,4059,4060,4076,4076,4077,4077,4075,4075,4088,4089,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1002,1003,1004,1005,1006,1007,1008,1009,1010,1084,1085,1103
,1117,1118,1119,1120,1122,1141,1142,1246,1247,1248,1249,1272,1272,1275,1275,1275,1278,1278,1332,1333,1334,1335,1336,1337,1338,1339,1365,1366,10119,1011
,10120,1585,1685,1686,1272,1880,1881,1888,1889,1890,1891,1906,1907,1278,1945,1965,1983,1984,1985,1985,1987,1987,1413,1508,1509,1509,1687,1417,1426,1432
,1433,1296,1362,770,931,1503,1504,1505,1501,1502,2591,2592,2593,2594,2595,2619,2622,2627,2628,2629,2630,2631,2650,2651,2658,2659,2730,2731,2725,2723
,2720,2724,2722,2719,2721,2718,2578,2577,2882,2899,2921,336,2944,2621,2969,2989,2990,2998,2999,336,1272,1275,1278,1115,1116,4009,1244,1219,1030,4051
,4052,4053,4054,4055,4074,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2015,2016,2017,2018,2019,2020,2021,2026,2027,2070,2071,2072,2077,2078,2088,2089,2129,2131,2132,2133,2134,1064,2157,2158,2161
,2162,2168,2173,2174,2187,2280,2288,2289,2290,2291,2292,2293,2298,1801,1802,1803,1804,2304,2305,2306,2309,2310,2160,2159,1453,2350,2351,2373,2374,2375
,2376,2377,2378,2399,2580,2987,2983,2984,2985,2986,2992];



?>