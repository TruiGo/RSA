//
//  RSA.h
//  songbaogang
//
//  Created by songbaogang on 16-6-6.
//  Copyright (c) 2016年 songbaogang. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface RSA : NSObject

+ (NSString *)encryptString:(NSString *)str publicKey:(NSString *)pubKey;
+ (NSString *)encryptData:(NSData *)data publicKey:(NSString *)pubKey;

//加密长字符串
+ (NSString *)encryptLongString:(NSString *)longStr publicKey:(NSString *)pubKey;
@end
