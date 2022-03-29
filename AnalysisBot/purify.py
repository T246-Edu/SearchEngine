import csv
import random
import string
from AnalysisBot.rearrange import *
def arrangee(lines,gender,group,sep):
    file = open("data.csv", "a", newline="", encoding="utf-8")
    writer = csv.writer(file)
    ascii = set(string.ascii_letters + " ")
    for line in lines:
        if len(line.replace("\n", "")) > 0:
            line = line.replace("\n", "")
            name = ""
            description = ""
            
            if (line.replace(" ", ""))[len(line.replace(" ", ""))-1] == ":":
                name = line.replace(":", "")
                description = "{} or {}".format(
                    (lines[lines.index(line + "\n")+1]).replace("\n", ""), (lines[lines.index(line + "\n")+1]).replace("\n", ""))
            else:
                dd = line.split(sep)
                name = dd[0]
                try:
                    description = dd[1]
                except:
                    description = ""
            try:
                mail = rearrange(toList(name), 1)
                special_chars = "0123456789-*/=+_)(&^%$#@!~`?><'\":;,"
                mail = "".join(x for x in mail if x not in special_chars)
                mail = "".join(x for x in remove_non_ascii(mail))
                mail = mail+"{}{}".format(random.choice(string.ascii_letters),
                                        random.choice(string.digits))+"@gmail.com"
            except:
                mail = name+"@gmail.com"
            if (description != ""):
                writer.writerow([name, description, gender, group, mail])
