import xml.etree.ElementTree as ET
from operator import itemgetter

tree = ET.parse("unwdmi_stations.xml")
root = tree.getroot()

tree2 = ET.parse("data.xml")
root2 = tree2.getroot()

stations = []
listThreeLands = []
listRadius = []
prcp_list = []
prcp_list_filtered = []
stp_list = []
stp_list_filtered = []

for d in root.findall("./row"):

    stn = d.find("stn")
    country = d.find("country")
    latitude = d.find("latitude")
    longitude = d.find("longitude")

    stations.append(
        {
            "STN": stn.text,
            "COU": country.text,
            "LAT": latitude.text,
            "LONG": longitude.text,
        }
    )

# aus, singapore en indo
def createListThreeLands():
    for d in stations:
        if (
            d["COU"] == "AUSTRALIA"
            or d["COU"] == "INDONESIA"
            or d["COU"] == "SINGAPORE"
        ):
            listThreeLands.append(d)


createListThreeLands()
# print(listThreeLands)

# radius
def isInside(singapore_x, singapore_y, rad, x, y):

    if (x - singapore_x) * (x - singapore_x) + (y - singapore_y) * (
        y - singapore_y
    ) <= rad * rad:
        return True


def radiusTest(x, y):

    singapore_x = 1.290270
    singapore_y = 103.851959
    # rad = 9.009009009009009009009009009009
    rad = 18.01

    if isInside(singapore_x, singapore_y, rad, x, y):
        return True


def createListRadius():

    for d in stations:
        if radiusTest(float(d["LAT"]), float(d["LONG"])):
            listRadius.append(d)


createListRadius()
# print(listRadius)

# vinden van alle stn en prcp waardes uit data.xml en dit in dicts zetten (in een list)
for m in root2.findall("./MEASUREMENT"):

    stn2 = m.find("STN")
    prcp2 = m.find("PRCP")
    dic = {"STN": stn2.text, "PRCP": prcp2.text}
    prcp_list.append(dic)

    stp = m.find("STP")
    slp = m.find("SLP")
    dic2 = {"STN": stn2.text, "STP": stp.text, "SLP": slp.text}
    stp_list.append(dic2)


def createPrcpList():
    for d in listRadius:
        for e in prcp_list:
            if d["STN"] == e["STN"]:
                prcp_list_filtered.append(e)


createPrcpList()
print("\nprcp_list_filtered:")
print(prcp_list_filtered)


def threeCountries():
    for a in listThreeLands:
        for b in stp_list:
            if a["STN"] == b["STN"] and a["STN"]:
                stp_list_filtered.append(b)


threeCountries()
print("\nstp_list_filtered:")
print(stp_list_filtered)


def findTop20prcp():
    top20prcp = []
    newlist = sorted(prcp_list_filtered, key=lambda k: k["PRCP"])
    newlist.reverse()
    for x in range(0, 20):
        dubbel = False
        for y in top20prcp:
            if newlist[x]["STN"] == y["STN"]:
                dubbel = True
        if dubbel == False:
            top20prcp.append(newlist[x])
    print(top20prcp)


print("\nde top 20 is:")
findTop20prcp()
