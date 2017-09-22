import os

class Gen:

    def __init__(self):
        self.classKeys = []
        self.classParams = []
        self.classMap = []
        self.doFiles = []
        self.sep = os.sep
   
    def start(self):
        modelPath = os.getcwd() + self.sep + 'src' + self.sep + 'Model' + self.sep
        examplePath =  os.getcwd() + self.sep + 'example' + self.sep

        className  = input('Please input class name: ')
        classGroup = input('Please input class group: ')

        classKeyLabel = "Please input class property-key: "
        classValueLabel = "Please input class property-params: "

        quit = False
        while True:
            inputText = input(classKeyLabel)
            if inputText == 'q':
                quit = True
                break;
            else:
                self.classKeys.append(inputText)
                self.classParams.append(input(classValueLabel))


        self.classMap = list(zip(self.classKeys, self.classParams))

        modelGroupPath = modelPath + classGroup
        exampleGroupPath = examplePath + classGroup

        modelView   = self.doModelView(className, classGroup)
        exampleView = self.doExampleView(className, classGroup)

        self.doMkDir(modelGroupPath)
        self.doMkDir(exampleGroupPath)

        self.doFile(modelGroupPath + self.sep + className + '.php', modelView)
        self.doFile(exampleGroupPath + self.sep + className + '.php', exampleView)

        print('Gen list : ')
        print(self.doFiles)


    def doMkDir(self, path):
        if os.path.isdir(path) == False:
            try:
                os.mkdir(path)
            except:
                print('Failed to mkdir !!!')

    def doFile(self, path, content):
        confrim = True
        if os.path.isfile(path):
            status = input('Whether or not to replace ' + path + ' ? (y/n, default y) ')
            if status == 'n':
                confrim = False

        if confrim:
            f = open(path, 'w')
            try:
                f.write(content)
            except:
                print('Failed to write file !!!')

            f.close()

            self.doFiles.append(path)

    def doExampleView(self, className, classGroup):
        str  = '<?php' + '\n'
        str += 'require_once __DIR__ . ' + '\'../../../vendor/autoload.php\'' + ';' + '\n\n'
        str += 'use ApiGateway\Model\\' + classGroup + '\\' + className + ';'  + '\n'
        str += 'use ApiGateway\ApiService;' + '\n\n'
        str += '$object = new ' + className + '();' + '\n'

        functionStr = ''
        for (key, params) in self.classMap:
            functionStr += '$object->set' + key + '();' + '\n'

        str += functionStr + '\n'

        str += '$serviceObj = new ApiService($object);' + '\n'
        str += '$response   = $serviceObj->get();' + '\n\n'
        str += 'print_r($response);'

        return str

    def doModelView(self, className, classGroup):
        str  = '<?php' + '\n'
        str += 'namespace ApiGateway\Model\\' + classGroup + ';' + '\n\n'
        str += 'use ApiGateway\ApiModel;' + '\n\n'
        str += 'class ' + className + ' extends ApiModel' + '\n'
        str += '{' + '\n'
        
        propertyStr = ''
        functionStr = ''
        for (key, params) in self.classMap:
            propertyStr += '    public $' + key + ';' + '\n\n'
            functionStr += '    public function set' + key + '($' + params + ')'  + '\n'
            functionStr += '    {' + '\n'
            functionStr += '        $this->' + key + ' = $' + params + ';' + '\n\n'
            functionStr += '        return $this;' + '\n'
            functionStr += '    }' + '\n\n'

        str += propertyStr
        str += functionStr

        str += '}'

        return str

while input('Are you starting to generate model and example code ? (y/n, default y) ') != 'n':
    gen = Gen()
    gen.start()