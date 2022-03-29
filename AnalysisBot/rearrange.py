MAX = 256


class charFreq(object):
    def __init__(self, c, f):
        self.c = c
        self.f = f

# A utility function to swap two charFreq items.


def swap(x, y):
    return y, x

# A utility function


def toList(string):
    t = []
    for x in string:
        t.append(x)

    return t

# A utility function


def toString(l):
    return ''.join(l)


def maxHeapify(freq, i, heap_size):
    l = i*2 + 1
    r = i*2 + 2
    largest = i
    if l < heap_size and freq[l].f > freq[i].f:
        largest = l
    if r < heap_size and freq[r].f > freq[largest].f:
        largest = r
    if largest != i:
        freq[i], freq[largest] = swap(freq[i], freq[largest])
        maxHeapify(freq, largest, heap_size)


def buildHeap(freq, n):
    i = (n - 1)//2
    while i >= 0:
        maxHeapify(freq, i, n)
        i -= 1


def extractMax(freq, heap_size):
    root = freq[0]
    if heap_size > 1:
        freq[0] = freq[heap_size-1]
        maxHeapify(freq, 0, heap_size-1)
    return root


def rearrange(string, d):
    n = len(string)
    freq = []
    for x in range(MAX):
        freq.append(charFreq(0, 0))
    m = 0
    for i in range(n):
        x = ord(string[i])
        if freq[x].c == 0:
            freq[x].c = chr(x)
            m += 1
        freq[x].f += 1
        string[i] = '\0'
    buildHeap(freq, MAX)
    for i in range(m):
        x = extractMax(freq, MAX-i)
        p = i
        while string[p] != '\0':
            p += 1
        for k in range(x.f):
            if p + d*k >= n:
                print("Cannot be rearranged")
                return
            string[p + d*k] = x.c
    return toString(string)
def remove_non_ascii(s):
    return filter(lambda x: x in ascii, s)