import xml.etree.ElementTree as ET
from operator import itemgetter

tree = ET.parse('data.xml')
root = tree.getroot()

prcp_list = []
stp_list = []

for m in root.findall("./MEASUREMENT"):

    stn = m.find("STN")
    print('\nStation:')
    print(stn.text)

    stp = m.find("STP")
    print('\nPressure Station:')
    print(stp.text)

    slp = m.find("SLP")
    print('\nPressure Sea:')
    print(slp.text)

    prcp = m.find("PRCP")
    print('\nRainfall:')
    print(prcp.text)
    #prcp_list.append(prcp.text)

    print('\nstn en prcp:')
    print(stn.text + " " + prcp.text)
    dic = {"STN" : stn.text, "PRCP" : prcp.text}
    prcp_list.append(dic)

    print('\nstn en stp:')
    print(stn.text + " " + prcp.text)
    dic2 = {"STN" : stn.text, "STP" : stp.text}
    stp_list.append(dic2)

def findTop20prcp():
    top20prcp = []
    newlist = sorted(prcp_list, key=lambda k: k['PRCP'])
    newlist.reverse()
    for x in range(0,20):
        #print(f'x is: {prcp_list[x]}')
        top20prcp.append(newlist[x])
    print(top20prcp)

print('\nTop 20 prcp:')
findTop20prcp()

print("\nDe luchtdruk is:")
print(stp_list)
