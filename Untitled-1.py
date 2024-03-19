import math
def grade(grade):
    if grade>=90:
        return "O"
    elif grade>=80:
        return "A+"
    elif grade>=70:
        return "A"
    elif grade>=60:
        return "B+"
    elif grade>=50:
        return "B"
    elif grade>=40:
        return "C"
    elif grade>=30:
        return "P"
    else:
        return "F"
def claculate(l,num):
    min_list=[math.ceil(i/10)*10-i for i in l]
    for i in range(len(l)):
        k=min(min_list)
        if num>=k:
            index_=min_list.index(k)
            l[index_]+=k
            min_list[index_]=l[index_]
            num-=k
        else:
            break
    return [grade(i) for i in l]

l=[84,69,79,96]
num=6
newgradelist=claculate(l.copy(),num)
print(newgradelist)